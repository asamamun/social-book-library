$.ajax({
    url: 'count_elements.php',
    type: 'GET',
    success: function(response) {
      $('#result').html(response); // Display the results in the result div
    },
    error: function() {
      alert('Error occurred while processing the request.');
    }
  });