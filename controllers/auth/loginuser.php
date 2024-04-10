<?php


use Core\App;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

echo $password;

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if(!$user){
    echo 'Email does not exitst!';
    die();
}

if(password_verify($password, $user['password'])){
    $_SESSION['user'] = [
        'id' => $user['user_id'],
        'username' => $user['username'],
        'balance' => $user['balance']
    ];

    header('Location: /');
    exit;
}

