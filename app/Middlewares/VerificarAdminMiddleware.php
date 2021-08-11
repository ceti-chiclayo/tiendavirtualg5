<?php


namespace App\Middlewares;


use Core\Application;

class VerificarAdminMiddleware extends \Core\Middleware
{

    public function execute()
    {
        $action_actual = Application::$contenedor->controller->accion_actual;
        if (empty($this->getFunciones()) || in_array($action_actual, $this->getFunciones())) {
            if (!session()->get('usuario')) {
                response()->redirect('/login');
            } else {
                $usuario = auth()->user();
                if (isset($usuario->cliente_id)) {
                    response()->redirect('/');
                }
            }
        }
    }
}