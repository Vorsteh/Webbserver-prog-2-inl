<?php
namespace Core;

class Router{

    protected $routes = [];

    public function get($route,  $path)
    {
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            $route[$route] = ['method' => 'GET', 'controller' => 'path'];
        }

        return $this;
    }

    public function route()
    {
        foreach ($this->routes as $route);
    }
}