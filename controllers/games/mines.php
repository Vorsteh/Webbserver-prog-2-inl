<?php
use Core\App;
use Core\Database;

$success = false;
$skibidi = false;
$betAmount = isset($_POST['betAmount']) ? floatval($_POST['betAmount']) : 0;
$newBalance = 0;
$bet = isset($_POST['bet']) ? floatval($_POST['bet']) : 0;
$multi = isset($_POST['multi']) ? floatval($_POST['multi']) : 0;

$db = App::resolve(Database::class);


if(isset($_SESSION['user']) && $betAmount && !$bet){
    $balanceResult = $db->query('SELECT balance FROM users WHERE user_id = :id', [
        'id' => $_SESSION['user']['id'],
    ])->find();

    $balance = isset($balanceResult['balance']) ? floatval($balanceResult['balance']) : 0;

    if($balance >= $betAmount){
        $newBalance = $balance - $betAmount;

        $db->query('UPDATE users SET balance = :newBalance WHERE user_id = :id', [
            'newBalance' => $newBalance,
            'id' => $_SESSION['user']['id'],
        ]);

        $_SESSION['user']['balance'] = $newBalance;

        $success = true;
    }
}
if(isset($_SESSION['user']) && $bet && $multi){
    $balanceResult = $db->query('SELECT balance FROM users WHERE user_id = :id', [
        'id' => $_SESSION['user']['id'],
    ])->find();

    $balance = isset($balanceResult['balance']) ? floatval($balanceResult['balance']) : 0;

    $newBalance = $balance + ($multi * $bet);

    $db->query('UPDATE users SET balance = :b WHERE user_id = :id', [
        'b' => $newBalance,
        'id' => $_SESSION['user']['id'],
    ]);

    $_SESSION['user']['balance'] = $newBalance;

    $success = true;
}

$response = [
    'success' => $success,
    'bet'=>$bet,
    'multi' => $multi,
    'win_loss' => $bet * $multi,
    'newBalance' => $newBalance
];

// Set the Content-Type header to JSON
header('Content-Type: application/json');

// Output the JSON-encoded response
echo json_encode($response);
