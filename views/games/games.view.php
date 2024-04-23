<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<form id="placeBetForm">
    <label for="guess">Guess:</label>
    <input type="text" id="guess" name="guess">
    <br>
    <label for="betAmount">Bet Amount:</label>
    <input type="text" id="betAmount" name="betAmount">
    <br>
    <button type="submit">Place Bet</button>
</form>

</body>
</html>
<script>
    $(document).ready(function(){
        $('#placeBetForm').submit(function(event) {
            // Prevent default form submission
            event.preventDefault();
            console.log('heheh');

            var guess = $('#guess').val();
            var betAmount = $('#betAmount').val();

            // Make AJAX call
            $.ajax({
                url: 'index.php',
                method: 'POST',
                data: {
                    route: 'placeBet',
                    guess: guess,
                    betAmount: betAmount
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#result').text('Result: ' + response.result);
                    $('#randomNumber').text('Random Number: ' + response.randomNumber);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

