<?php
$games = [
    '1' => 'dice',
    '2' => 'mines'
];

if (isset($_GET['id']) && $_GET['id'] !== '') {
    $gameId = $_GET['id'];

    if (array_key_exists($gameId, $games)) {
        $game = $games[$gameId];
        $gameToInclude = 'games/' . $game . '.php';

    } else {
        $gameToInclude = null;
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $heading?></title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/1740fbf071.js" crossorigin="anonymous"></script>
</head>
<body class="min-h-screen w-full h-auto m-auto bg-[#1A2C38]">
<?php
require base_path('views/components/navbar.php');
?>
<div class="flex">
    <?php if($gameToInclude) require base_path('views/' . $gameToInclude); ?>
</div>


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

