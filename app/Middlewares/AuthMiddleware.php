<?php

namespace App\Middlewares;

use Core\Application;
use Core\Middleware;

class AuthMiddleware extends Middleware
{

    public function execute()
    {
        $action_actual = Application::$contenedor->controller->accion_actual;
        if (empty($this->getFunciones()) || in_array($action_actual, $this->getFunciones())) {
            if (!session()->get('usuario')) {
                response()->redirect('login');
            }
        }
    }
}
