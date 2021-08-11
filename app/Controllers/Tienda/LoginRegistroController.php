<?php

namespace App\Controllers\Tienda;

use App\Models\Cliente;
use App\Models\Usuario;
use Core\Controller;
use Core\Request;
use Valitron\Validator;
use Illuminate\Database\Capsule\Manager as DB;

class LoginRegistroController extends Controller
{


    public function formularios(): string
    {
        $this->setLayout('tienda');
        return view('tienda/login-register');
    }

    public function registro(Request $request)
    {
        $datos = $request->getBody();
        $validador = new Validator($datos);
        $validador->rule('required', 'nombres');
        $validador->rule('required', 'apellido_paterno');
        $validador->rule('required', 'apellido_materno');
        $validador->rule('required', 'email');
        $validador->rule('required', 'password');
        $validador->rule('required', 'password_confirmacion');
        $validador->rule('email', 'email');
        $validador->rule('equals', 'password_confirmacion', 'password');
        $validador->labels([
            'apellido_paterno' => 'Apellido paterno',
            'apellido_materno' => 'Apellido materno',
            'password' => 'Contraseña',
            'password_confirmacion' => 'Confirmación de contraseña'
        ]);
        if (!$validador->validate()) {
            $errores = $validador->errors();
            session()->setFlash('errores', $errores);
            session()->setFlash('values', $datos);
            response()->redirect('/login-registro');
        }

        // transaction
        DB::beginTransaction(); // iniciar la transaccion

        try {
            // cliente
            $cliente = new Cliente();
            $cliente->nombres = $datos['nombres'];
            $cliente->apellido_paterno = $datos['apellido_paterno'];
            $cliente->apellido_materno = $datos['apellido_materno'];
            $cliente->email = $datos['email'];
            $cliente->save();

            // registrar
            $usuario = new Usuario();
            $usuario->nombre_completo = $datos['nombres'] . " " . $datos['apellido_paterno'] . " " . $datos['apellido_materno'];
            $usuario->email = $datos['email'];
            $usuario->password = password_hash($datos['password'], PASSWORD_DEFAULT);
            $usuario->cliente_id = $cliente->id;
            $usuario->save();

            DB::commit(); // confirmar los cambios de la transaccion
            session()->setFlash('mensaje', 'Registrado correctamente');
        } catch (\Exception $error) {
            DB::rollback(); // deshacer los cambios de la transaccion
            session()->setFlash('mensaje_error', 'Registrado correctamente');
        } finally {
            response()->redirect('/login-registro');
        }
    }


    public function login(Request $request)
    {
        $validator = new Validator($request->getBody());
        $validator->rule('required', 'email-login')->label('Correo electrónico');
        $validator->rule('email', 'email-login')->label('Correo electrónico');
        $validator->rule('required', 'password-login')->label('Contraseña');
        if (!$validator->validate()) {
            session()->setFlash('errores', $validator->errors());
            session()->setFlash('values', $request->getBody());
            response()->redirect('/login-registro');
        }
        $usuario_existe = Usuario::firstWhere('email', $request->get('email-login'));
        if (is_null($usuario_existe)) {
            session()->setFlash('errores', [
                'email-login' => ['Datos no coinciden con nuestros registros']
            ]);
            session()->setFlash('values', $request->getBody());
            response()->redirect('/login-registro');
        }
        if (!password_verify($request->get('password-login'), $usuario_existe->password)) {
            session()->setFlash('errores', [
                'password-login' => ['Contraseña incorrecta']
            ]);
            session()->setFlash('values', $request->getBody());
            response()->redirect('/login-registro');
        }
        session()->set('usuario', $usuario_existe->id);
        response()->redirect('/mi-cuenta');
    }

    public function logout()
    {
        session_destroy();
        response()->redirect("/login-registro");
    }
}
