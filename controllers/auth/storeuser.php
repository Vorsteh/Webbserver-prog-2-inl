<?php

use Core\Database;
use Core\Validator;
use Core\App;

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if(!Validator::string($username, 3, 25)){
    $errors['username'] = 'Invalid email address.';
}

if(!Validator::string($password, 4, 30)){
    $errors['password'] = 'Invalid password.';
}

if(!Validator::email($email)){
    $errors['username'] = 'Invalid email';
}
if(!empty($errors)){

    view('/auth/register.view.php', [
        'errors' => $errors
    ]);

    return;
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE username = :name OR email = :email', [
    'name' => $username,
    'email' => $email
])->find();

if($user){
    header('location: /');
    exit();
}
else{

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $success = $db->query('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)', [
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword
    ]);

    if ($success) {
        $userData = $db->query('SELECT user_id, balance FROM users WHERE username = :username', ['username' => $username])->find();

        if ($userData) {
            $_SESSION['user'] = [
                'id' => $userData['user_id'],
                'username' => $userData['username'],
                'balance' => $userData['balance']
            ];

            header('Location: /');
            exit;
        }

        header('Location: /');
        exit();
    } else {
        echo "Registration failed. Please try again.";
    }
}
