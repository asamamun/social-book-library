
$(document).ready(function() {
    // $.ajax({
    //     url: 'countNames.php',
    //     dataType: 'json',
    //     success: function(data) {
    //         $('#nameCount').text(data);
    //     },
    //     error: function(xhr, status, error) {
    //         console.error(xhr.responseText);
    //     }
    // });
    // $.ajax({
    //     url: 'countNames.php',
    //     dataType: 'json',
    //     success: function(districs) {
    //         $('#districs').text(districs);
    //     },
    //     error: function(xhr, status, error) {
    //         console.error(xhr.responseText);
    //     }
    // });

    $.ajax({
        url: 'countNames.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
          // Handle the response from the PHP file
          // Display the counters in the respective elements
          $('#book-counter').html(response.bookCount);
          $('#user-counter').html(response.userCount);
          $('#writer-counter').html(response.writerCount);
          $('#publisher-counter').html(response.publisherCount);
          $('#last-10-post').html(response.last10PostsHTML);
          $('#daily-post').html(response.dailyPosts);
        },
        error: function(xhr, status, error) {
          // Handle any errors that occur during the Ajax request
          console.log(error);
        }
      });
      
});
