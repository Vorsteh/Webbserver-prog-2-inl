<?php

$heading = 'About';
$id = $_GET['id'] ?? null;

view('about.view.php', [
    'heading' => $heading,
    'id' => $id
]);