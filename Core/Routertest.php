<?php

namespace Core;
class Routertest
{

    protected $routes = [];
    public function add($method, $uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }
    public function get($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            return $this->add('GET', $route, $path_to_include);
        }
    }

    public function post($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return $this->add('POST', $route, $path_to_include);
        }
    }

    public function put($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            return $this->add('PUT', $route, $path_to_include);
        }
    }

    public function patch($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
            return $this->add('PATCH', $route, $path_to_include);
        }
    }

    public function delete($route, $path_to_include)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            return $this->add('DELETE', $route, $path_to_include);
        }
    }

    public function any($route, $path_to_include)
    {
        return $this->add('GET', $route, $path_to_include);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if($route['uri' === $uri] && $route['method'] === strtoupper($method)){
                return require base_path($route['controller']);
            }
        }

        abort();
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    function out($text)
    {
        echo htmlspecialchars($text);
    }

    public static function set_csrf()
    {
        session_start();
        if (!isset($_SESSION["csrf"])) {
            $_SESSION["csrf"] = bin2hex(random_bytes(50));
        }
        echo '<input type="hidden" name="csrf" value="' . $_SESSION["csrf"] . '">';
    }

    public static function is_csrf_valid()
    {
        session_start();
        if (!isset($_SESSION['csrf']) || !isset($_POST['csrf'])) {
            return false;
        }
        if ($_SESSION['csrf'] != $_POST['csrf']) {
            return false;
        }
        return true;
    }
}