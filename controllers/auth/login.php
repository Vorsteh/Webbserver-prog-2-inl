<?php


if(isset($_SESSION['user'])) {
    header('Location: /');
}

view('auth/login.view.php');