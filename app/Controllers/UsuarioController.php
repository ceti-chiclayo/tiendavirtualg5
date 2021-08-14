<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Middlewares\VerificarAdminMiddleware;
use App\Models\Usuario;
use Core\Controller;
use Core\Request;
use Valitron\Validator;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
        $this->registerMiddleware(new VerificarAdminMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/usuarios/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $texto_busqueda = $datos['texto_busqueda'];
        $usuarios = Usuario::where('nombre_completo', 'LIKE', '%' . $texto_busqueda . '%')->orderBy('nombre_completo')->get();
        return viewOnly('admin/usuarios/search', [
            'usuarios' => $usuarios
        ]);
    }

    public function create()
    {
        return viewOnly('admin/usuarios/create');
    }

    public function store(Request $request)
    {
        $datos = $request->getBody();
        $validator = new Validator($datos);
        $validator->rule('required', 'nombre_completo');
        $validator->rule('required', 'email');
        $validator->rule('required', 'password');
        $validator->rule('required', 'password_confirmacion');
        $validator->rule('equals', 'password_confirmacion', 'password');
        $validator->labels([
            'nombre_completo' => 'Nombre completo',
            'email' => 'Correo electrónico',
            'password' => 'Contraseña',
            'password_confirmacion' => 'Confirmación de contraseña'
        ]);
        if (!$validator->validate()) {
            return response()->json(['errores' => $validator->errors()], 422);
        }
        // validar que correo electrónico no esté siendo usado por otro usuario
        $usuario_existente = Usuario::firstWhere('email', $request->get('email'));
        if (!is_null($usuario_existente)) {
            return response()->json(['errores' => ['email' => ['Correo electrónico en uso']]], 422);
        }

        try {
            $usuario = new Usuario;
            $usuario->nombre_completo = $request->get('nombre_completo');
            $usuario->email = $request->get('email');
            $usuario->password = password_hash($request->get('password'), PASSWORD_DEFAULT);
            if ($usuario->save()) {
                return response()->json(['message' => 'Registrado correctamente'], 201);
            }
            return response()->json(['message' => 'Error al registrar'], 500);
        } catch (\Exception $error) {
            return response()->json(['message' => 'Error al registrar'], 500);
        }
    }

    public function edit($usuario_id)
    {
        $usuario = Usuario::find($usuario_id);
        return viewOnly('admin/usuarios/edit', [
            'usuario' => $usuario
        ]);
    }

    public function update($usuario_id, Request $request)
    {
        $datos = $request->getBody();
        $validator = new Validator($datos);
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
            return response()->json(['errores' => $validator->errors()], 422);
        }
        // validar que correo electrónico no esté siendo usado por otro usuario, exceptuando a el mismo
        $usuario_existente = Usuario::where('email', $request->get('email'))->whereNotIn('id', [$usuario_id])->first();
        if (!is_null($usuario_existente)) {
            return response()->json(['errores' => ['email' => ['Correo electrónico en uso']]], 422);
        }

        try {
            $usuario = Usuario::find($usuario_id);
            $usuario->nombre_completo = $request->get('nombre_completo');
            $usuario->email = $request->get('email');
            if (!is_null($request->get('password'))) {
                $usuario->password = password_hash($request->get('password'), PASSWORD_DEFAULT);
            }
            if ($usuario->save()) {
                return response()->json([], 200);
            }
            return response()->json(['message' => 'Error al actualizar'], 500);
        } catch (\Exception $error) {
            return response()->json(['message' => 'Error al actualizar'], 500);
        }
    }

    public function destroy($usuario_id)
    {
        $usuario = Usuario::find($usuario_id);
        if ($usuario->delete()) {
            return response()->json(['message' => 'Eliminado correctamente'], 200);
        }
        return response()->json(['Error al eliminar'], 500);
    }
}
