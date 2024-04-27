<?php


if(isset($_SESSION['user'])) {
    header('Location: /');
    die();
}

view('auth/login.view.php',
    [
        'heading' => 'Login'
    ]
);