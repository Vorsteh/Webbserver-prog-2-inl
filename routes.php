<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/about/$id', 'controllers/about.php');

//LOGIN
$router->post('/login', 'controllers/auth/loginuser.php');
$router->get('/login', 'controllers/auth/login.php');


//REGISTER

$router->post('/register', 'controllers/auth/storeuser.php');
$router->get('/register', 'controllers/auth/register.php');

$router->get('/logout', function (){
    session_destroy();
    header('Location: login');
    die();
});

$router->get('/test', 'controllers/test.php')->only('auth');