<?php

namespace App\Controllers;

use App\Models\Cliente;
use App\Models\Usuario;
use Core\Application;
use Core\Controller;

class RegistroController extends Controller
{

    public function formularioRegistro()
    {
        $this->setLayout('auth');
        return view("auth/registro");
    }

    public function registro()
    {
        $datos = Application::$contenedor->request->getBody();

        $cliente = new Cliente();
        $cliente->apellido_paterno = $datos['apellido_paterno'];
        $cliente->apellido_materno = $datos['apellido_materno'];
        $cliente->nombres = $datos['nombres'];
        $cliente->email = $datos['email'];
        $cliente->registrar();

        $usuario = new Usuario();
        $usuario->cliente_id = $cliente->id;
        $usuario->email = $datos['email'];
        $usuario->password = $datos['password'];
        $usuario->nombre_completo = $cliente->nombreCompleto();

        if ($usuario->registrar()) {
            // enviar el correo
            // $mail = Application::$contenedor->mail;
            // $body = "<h1>Gracias por registrarte en nuestra tienda virtual</h1>
            //         <img src='https://tiendavirtualg5.test/imagenes/imagen1.png'/>";
            // $mail->mensaje(
            //     $usuario->email,
            //     $usuario->nombre_completo,
            //     'Gracias por tu registro',
            //     $body,
            //     'ventas@cetistore.com',
            //     'Ventas CETI Store'
            // );
            // $mail->enviarMensaje();
            response()->redirect("/login");
        } else {
            session()->setFlash('mensaje_error', 'No se pudo completar el registro');
            session()->setFlash('email', $datos['email']);
            session()->setFlash('nombre_completo', $datos['nombre_completo']);
            response()->redirect("/registro");
        }
    }
}
