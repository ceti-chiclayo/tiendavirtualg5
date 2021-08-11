<?php

namespace Core;

use Valitron\Validator;

class Application
{

    public Router $router;
    public Request $request;
    public Response $response;
    public View $view;
    public Database $db;
    public Session $session;
    public Controller $controller;
    public static string $ROOT_DIR;
    public static Application $contenedor;
    public Mail $mail;
    public Authentication $auth;

    public function __construct(string $root_dir, array $config = [])
    {
        self::$ROOT_DIR = $root_dir;
        self::$contenedor = $this;
        $this->auth = new Authentication();
        $this->mail = new Mail();
        $this->request = Request::createFromGlobals();
        $this->response = new Response();
        $this->router = new Router($this->request);
        $this->view = new View();
        $this->db = new Database($config['db']); // creando una instancia de Database
        new DatabaseORM($config['db']); // iniciando el ORM
        $this->session = new Session();
        Validator::lang('es'); // libreria de validacion devolvera mensaje en español
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
