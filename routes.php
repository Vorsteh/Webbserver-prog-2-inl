<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/about/$id', 'controllers/about.php');

//LOGIN
$router->post('/login', 'controllers/auth/loginuser.php');
$router->get('/login', 'controllers/auth/login.php');


//REGISTER

$router->post('/mines', 'controllers/games/mines.php');

$router->post('/register', 'controllers/auth/storeuser.php');
$router->get('/register', 'controllers/auth/register.php');

$router->get('/logout', function (){
    session_destroy();
    header('Location: login');
    die();
});

$router->get('/games', 'controllers/games/games.php');

$router->get('/wallet', 'controllers/wallet.php');
$router->get('/profile', 'controllers/profile.php');