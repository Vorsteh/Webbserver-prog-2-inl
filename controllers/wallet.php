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

$user = isset($_SESSION['user']['id']) ? $user = new User($_SESSION['user']['username'], $_SESSION['user']['id'], $_SESSION['user']['balance']) : null;


$heading = 'Wallet';

view('wallet.view.php', [
    'heading' => $heading,
    'user' => $user
]);