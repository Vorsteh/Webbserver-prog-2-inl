<?php

$heading = 'About';
$id = $_GET['id'];

view('about.view.php', [
    'heading' => $heading,
    'id' => $id
]);