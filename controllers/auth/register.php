<?php

if(isset($_SESSION['user'])){
    header('Location: /');
    die();
}

$heading = "Register";

view("auth/register.view.php", [
    'heading' => $heading
]);
