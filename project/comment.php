<!DOCTYPE html>
<html>
<head>
    <title>Book Comments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Book Comments</h1>
        <hr>

        <!-- Displaying Comments -->
        <?php
        // Database connection settings
       require 'connDB.php';

        // Fetch comments from the database for a specific book
        $bookId = 3; // Replace with the actual book ID

        $sql = "SELECT comments.id, comments.comment, comments.user_id, comments.reply_id, comments.created_at, users.name
                FROM comments
                INNER JOIN users ON comments.user_id = users.id
                WHERE comments.book_id = $bookId
                ORDER BY comments.created_at DESC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $commentId = $row['id'];
                $comment = $row['comment'];
                $userId = $row['user_id'];
                $replyId = $row['reply_id'];
                $createdAt = $row['created_at'];
                $username = $row['name'];

                echo '<div class="card mb-2">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $username . '</h5>';
                echo '<p class="card-text">' . $comment . '</p>';
                echo '<p class="card-text">Posted on: ' . $createdAt . '</p>';
                echo '<a href="#" class="btn btn-sm btn-primary edit-comment" data-comment-id="' . $commentId . '">Edit</a>';
                echo '<a href="#" class="btn btn-sm btn-danger delete-comment" data-comment-id="' . $commentId . '">Delete</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No comments found.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>

        <!-- Add/Edit Comment Form -->
        <form id="comment-form">
            <div class="form-group">
                <textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Write your comment"></textarea>
            </div>
            <input type="hidden" name="book_id" value="<?php echo $bookId; ?>">
            <input type="hidden" name="comment_id" id="comment-id" value="">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // Edit comment button click event
        $(document).on('click', '.edit-comment', function(e) {
            e.preventDefault();
            var commentId = $(this).data('comment-id');
            var commentText = $(this).parent().siblings('.card-text').text().trim();
            $('#comment').val(commentText);
            $('#comment-id').val(commentId);
        });

        // Delete comment button click event
        $(document).on('click', '.delete-comment', function(e) {
            e.preventDefault();
            var commentId = $(this).data('comment-id');
            if (confirm('Are you sure you want to delete this comment?')) {
                // Perform delete operation using AJAX or submit a form to delete the comment
                $.ajax({
                    url: 'delete-comment.php',
                    method: 'POST',
                    data: { comment_id: commentId },
                    success: function(response) {
                        // Handle the response after deleting the comment
                        if (response === 'success') {
                            alert('Comment deleted successfully!');
                            location.reload(); // Refresh the page to reflect the changes
                        } else {
                            alert('An error occurred while deleting the comment. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle the error if deleting the comment fails
                        console.error(xhr.responseText);
                        alert('An error occurred while deleting the comment. Please try again.');
                    }
                });
            }
        });

        // Comment form submission
        $('#comment-form').submit(function(e) {
            e.preventDefault();
            var commentId = $('#comment-id').val();
            var commentText = $('#comment').val().trim();
            var bookId = $('[name="book_id"]').val();

            // Perform add/edit operation using AJAX or submit a form to add/edit the comment
            $.ajax({
                url: 'add-edit-comment.php',
                method: 'POST',
                data: {
                    comment_id: commentId,
                    book_id: bookId,
                    comment: commentText
                },
                success: function(response) {
                    // Handle the response after adding/editing the comment
                    if (response === 'success') {
                        alert('Commentadded successfully!');
                        location.reload(); // Refresh the page to reflect the changes
                    } else {
                        alert('An error occurred while saving the comment. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error if adding/editing the comment fails
                    console.error(xhr.responseText);
                    alert('An error occurred while saving the comment. Please try again.');
                }
            });
        });
    });
    </script>
</body>
</html>
