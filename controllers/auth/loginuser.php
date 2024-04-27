<?php


use Core\App;
use Core\Database;


$userc = $_POST['user'];
$password = $_POST['password'];

echo $password;

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :user OR username = :user', [
    'user' => $userc
])->find();

if(!$user){
    echo 'User does not exitst!';
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
header('Location: /login');
die();

