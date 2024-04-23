<?php

session_start();
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

require_once BASE_PATH . 'controllers/games/BetsController.php';
function routeRequest($controller, $method, $requestData) {
    $controllerInstance = new $controller();
    $controllerInstance->$method($requestData);
}
$routes = [
    'placeBet' => ['controller' => 'BetsController', 'method' => 'placeBet'],
];
if (isset($_POST['route']) && isset($routes[$_POST['route']])) {
    $route = $routes[$_POST['route']];
    $controller = $route['controller'];
    $method = $route['method'];

    routeRequest($controller, $method, $_POST);
}




spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

//$router = new \Core\Router();
$router = new \Core\Routershit();
$routes = require base_path('routes.php');

