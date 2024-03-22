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
$user = isset($_SESSION['id']) ? $user = new User($_SESSION['username'], $_SESSION['id'], $_SESSION['balance']) : null;

view("index.view.php", [
    'heading' => $heading,
    'user' => $user
]);
