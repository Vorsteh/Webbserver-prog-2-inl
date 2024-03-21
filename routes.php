<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/about/$id', 'controllers/about.php');


\Core\Router::post('/skibid', 'controllers/skibidi.php');