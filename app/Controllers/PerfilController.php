<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Middlewares\VerificarAdminMiddleware;
use App\Models\Usuario;
use Core\Request;
use Valitron\Validator;

class PerfilController extends \Core\Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
        $this->registerMiddleware(new VerificarAdminMiddleware());
    }

    public function index(): string
    {
        $usuario = auth()->user();
        $this->setLayout('app');
        return view('admin/perfil/index', compact('usuario'));
    }

    public function update(Request $request)
    {
        $validator = new Validator($request->getBody());
        $validator->rule('required', 'nombre_completo');
        $validator->rule('required', 'email');
        $validator->rule('requiredWith', 'password_confirmacion', 'password');
        $validator->rule('equals', 'password_confirmacion', 'password');
        $validator->labels([
            'nombre_completo' => 'Nombre completo',
            'email' => 'Correo electrónico',
            'password' => 'Contraseña',
            'password_confirmacion' => 'Confirmación de contraseña'
        ]);
        if (!$validator->validate()) {
            return response()->json(['message' => 'Error en los datos', 'errores' => $validator->errors()], 422);
        }
        // validar que correo electrónico no esté siendo usado por otro usuario, exceptuando a el mismo
        $usuario_existente = Usuario::where('email', $request->get('email'))->whereNotIn('id', [auth()->user()->id])->first();
        if (!is_null($usuario_existente)) {
            return response()->json(['message' => 'Error en los datos', 'errores' => ['email' => ['Correo electrónico en uso']]], 422);
        }
        $usuario = auth()->user();
        $usuario->email = $request->get('email');
        $usuario->nombre_completo = $request->get('nombre_completo');
        if (!is_null($request->get('password'))) {
            $usuario->password = password_hash($request->get('password'), PASSWORD_DEFAULT);
        }
        if ($usuario->save()) {
            return response()->json(['message' => 'Registrado correctamente'], 200);
        }
        return response()->json(['message' => 'Error al actualizar'], 500);
    }
}