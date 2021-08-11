<?php

namespace Core;

class Controller
{
    protected array $middlewares = [];
    public string $accion_actual;

    public function registerMiddleware(Middleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

    public function setLayout($layout)
    {
        Application::$contenedor->view->layout = $layout;
    }
}
