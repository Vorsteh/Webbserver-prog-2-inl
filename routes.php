<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/about/$id', 'controllers/about.php');

//LOGIN
$router->get('/login', 'controllers/auth/login.php');

//REGISTER
$router->get('/register', 'controllers/auth/register.php');
$router->post('/register', 'controllers/auth/storeuser.php');

\Core\Router::post('/skibid', 'controllers/skibidi.php');