<?php
require "./get_count.php";
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <p class="text-center fs-1 text-success">Welcome to Dashboard</p>
        <div class="row border py-3 rounded-3 ">
            <!-- first row -->
            <div class="row mt-3 ">
                <div class="col-md-3">
                    <div class="card border-primary mb-3 text-center bg-info  rounded-3 ">
                        <div class="card-header fs-4  text-light">Total Books</div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text text-dark fs-4"><?= $arr['books'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-primary mb-3 text-center bg-info  rounded-3">
                        <div class="card-header  fs-4 text-light">Total Users </div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text text-dark fs-4"><?= $arr['users'] ?> </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-primary mb-3 text-center bg-info rounded-3">
                        <div class="card-header  fs-4 text-light">Total Publishers</div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text text-dark fs-4"><?= $arr['publishers'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-primary mb-3 text-center bg-info rounded-3">
                        <div class="card-header  fs-4  text-light">Total Writter </div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text text-dark fs-4"><?= $arr['writers'] ?> </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- third row -->
            <!-- <div class="row">
                <div class="col-2"></div>
                <div class="col-3">
                    <div class="card border-primary mb-3 text-center" >
                        <div class="card-header">Total Division</div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text"><?= $arr['division'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
                <div class="col-3">
                    <div class="card border-primary mb-3 text-center" >
                        <div class="card-header">Total District </div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Count</h5>
                            <p class="card-text"><?= $arr['district'] ?> </p>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div> -->
        </div>
        <div class="row border py-3 rounded-3">
            <div class="col-md-7"></div>
            <div class="col-md-5">
                <div class="cart border rounded-3">
                    <div class="card-header text-white bg-success text-center"><h3>Last 10 Post</h3></div>
                    <div class="card-body">
                        <ol>
                        <?php
                        require 'connDB.php';

                        $query = "SELECT * FROM books ORDER BY id DESC LIMIT 10";
                        $result = $conn->query($query);

                        

                        while ($row = mysqli_fetch_assoc($result)) {

                                echo '<li><a href="../view_book.php?book_id=' . $row['id'] . '">'. $row['name'] . '</a></li>';
                               
                            }

                        // Close the database connection
                        $conn->close();
                        ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./get_count.php"></script>

</body>

</html>