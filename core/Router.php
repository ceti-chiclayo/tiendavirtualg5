<?php

namespace Core;

class Router
{

    protected Request $request;
    protected array $rutas = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(string $ruta, array $accion)
    {
        $this->rutas['get'][$ruta] = $accion;
    }

    public function post(string $ruta, array $accion)
    {
        $this->rutas['post'][$ruta] = $accion;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $accion = null;
        $parametros = [];
        if (isset($this->rutas[$method][$path])) {
            $accion = $this->rutas[$method][$path];
        } else {
            foreach ($this->rutas[$method] as $ruta_definida => $action) {
                $ruta_separada = explode("/", $ruta_definida);
                foreach ($ruta_separada as $key => $value) {
                    if (substr($value, 0, 1) === '{') {
                        $ruta_separada[$key] = "([A-Za-z0-9\-]+)";
                    }
                }
                $ruta_unida = implode("/", $ruta_separada);
                $ruta_con_delimitadores = "#^" . $ruta_unida . "$#";

                if (preg_match($ruta_con_delimitadores, $path, $coincidencias)) {
                    array_shift($coincidencias); // quitar primer elemento del array
                    $parametros = $coincidencias;
                    $accion = $action;
                }
            }
        }
        if (is_null($accion)) {
            response()->setStatusCode(404);
            Application::$contenedor->view->setLayout('app');
            return view('errors/404');
        }

        $controlador = $accion[0];
        $instancia = new $controlador;
        Application::$contenedor->controller = $instancia;
        Application::$contenedor->controller->accion_actual = $accion[1];
        $funcion = $accion[1];

        $middlewares = Application::$contenedor->controller->getMiddlewares();
        foreach ($middlewares as $middleware) {
            $middleware->execute();
        }
        $parametros[] = $this->request; // agregando el request al array de parametros
        return call_user_func_array([$instancia, $funcion], $parametros);
    }
}
