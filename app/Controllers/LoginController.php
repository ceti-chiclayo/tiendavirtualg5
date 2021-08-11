<?php

namespace App\Controllers;

use App\Models\Usuario;
use Core\Application;
use Core\Controller;

class LoginController extends Controller
{

    public function formularioLogin()
    {
        $this->setLayout('auth');
        return view('auth/login');
    }

    public function login()
    {
        $datos = Application::$contenedor->request->getBody();
        $usuario = new Usuario;
        $usuario->email = $datos['email'];
        $usuario->password = $datos['password'];
        if ($usuario->login()) {
            response()->redirect("/dashboard");
        } else {
            session()->setFlash('mensaje_error', 'Datos incorrectos');
            session()->setFlash('email', $datos['email']);
            response()->redirect("/login");
        }
    }
}
