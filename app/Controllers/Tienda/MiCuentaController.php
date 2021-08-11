<?php

namespace App\Controllers\Tienda;

use App\Middlewares\AuthClienteMiddleware;
use App\Models\Cliente;
use Core\Controller;
use Core\Request;
use Valitron\Validator;

class MiCuentaController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthClienteMiddleware(['inicio']));
    }

    public function inicio()
    {
        $this->setLayout('tienda');
        $opcion_activa = session()->getFlash('opcion_activa', 'dashboard');
        $usuario = auth()->user();
        $cliente = $usuario->cliente;
        return view('tienda/my-account', compact('cliente', 'usuario', 'opcion_activa'));
    }

    public function actualizarDatos(Request $request)
    {
        $validator = new Validator($request->getBody());
        $validator->rule('required', 'apellido_paterno');
        $validator->rule('required', 'apellido_materno');
        $validator->rule('required', 'nombres');
        $validator->rule('required', 'email');
        $validator->rule('email', 'email');
        $validator->rule('requiredWith', 'password_actual', 'password_nueva')->message('Contraseña actual es obligatoria si desea cambiar de contraseña');
        $validator->rule('requiredWith', 'password_nueva', 'password_actual')->message('Contraseña nueva es obligatoria si desea cambiar de contraseña');
        $validator->rule('requiredWith', 'password_nueva_confirmacion', 'password_nueva')->message('Confirmación de contraseña nueva es obligatoria si desea cambiar de contraseña');
        $validator->rule('equals', 'password_nueva_confirmacion', 'password_nueva');
        $validator->labels([
            'apellido_paterno' => 'Apellido paterno',
            'apellido_materno' => 'Apellido materno',
            'nombres' => 'Nombres',
            'email' => 'Correo electrónico',
            'password_actual' => 'Contraseña actual',
            'password_nueva' => 'Contraseña nueva',
            'password_nueva_confirmacion' => 'Confirmación de contraseña nueva',
        ]);
        if (!$validator->validate()) {
            session()->setFlash('inputs', $request->getBody());
            session()->setFlash('errores', $validator->errors());
            session()->setFlash('opcion_activa', 'detalles_cuenta');
            response()->redirect('/mi-cuenta');
        }
        // validar si desea cambiar de contraseña
        $usuario = auth()->user();
        if(!is_null($request->get('password_actual'))){

        }
        $cliente = $usuario->cliente;
        $cliente->apellido_paterno = $request->get('apellido_paterno');
        $cliente->apellido_materno = $request->get('apellido_materno');
        $cliente->nombres = $request->get('nombres');
        $cliente->email = $request->get('email');
        $cliente->apellido_paterno = $request->get('apellido_paterno');
        $cliente->apellido_paterno = $request->get('apellido_paterno');
        $cliente->apellido_paterno = $request->get('apellido_paterno');
    }
}
