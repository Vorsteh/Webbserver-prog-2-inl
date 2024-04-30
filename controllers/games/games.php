<?php


class User {
    public $id;
    public $username;
    public $balance;

    public function __construct($username, $id, $balance) {
        $this->username = $username;
        $this->id = $id;
        $this->balance = $balance;
    }
}

$heading = "Home";


$db = \Core\App::resolve(\Core\Database::class);
if($_SESSION['user']){
    $balanceResult = $db->query('SELECT balance FROM users WHERE user_id = :uid', [
        'uid' => $_SESSION['user']['id'],
    ])->find();
}

$user = isset($_SESSION['user']['id']) ? $user = new User($_SESSION['user']['username'], $_SESSION['user']['id'], $balanceResult['balance']) : null;

view('games/games.view.php', [
    'heading' => "Games",
    'user' => $user,
]);