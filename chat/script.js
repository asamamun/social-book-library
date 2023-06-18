$(document).ready(function() {
    // Display chat messages
    function displayMessage(sender, message) {
        var chatMessage = '<div class="message">' +
                            '<strong>' + sender + ': </strong>' +
                            '<span>' + message + '</span>' +
                          '</div>';
        $('#chatbox').append(chatMessage);
    }

    // Send message
    function sendMessage(message) {
        $.ajax({
            url: 'save_message.php',
            method: 'POST',
            data: { message: message },
            success: function(response) {
                displayMessage('You', message); // Display user message
                displayMessage('Chatbot', response); // Display chatbot response
                $('#userInput').val(''); // Clear input field
                $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight); // Scroll to bottom
            }
        });
    }

    // Handle user input
    $('#userInput').on('keydown', function(e) {
        if (e.keyCode === 13) { // Enter key pressed
            var userInput = $(this).val().trim();
            if (userInput !== '') {
                sendMessage(userInput);
            }
        }
    });
});
