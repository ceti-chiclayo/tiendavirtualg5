<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Sucursal;
use Core\Request;
use Valitron\Validator;

class SucursalController extends \Core\Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/sucursales/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $texto_busqueda = $datos['texto_busqueda'];
        $sucursales = Sucursal::where('nombre', 'LIKE', '%' . $texto_busqueda . '%')->get();
        return viewOnly('admin/sucursales/search', [
            'sucursales' => $sucursales
        ]);
    }

    public function create()
    {
        return viewOnly('admin/sucursales/create');
    }

    public function store(Request $request)
    {
        $datos = $request->getBody();
        $validator = new Validator($datos);
        $validator->rule('required', 'nombre');
        $validator->rule('required', 'direccion');
        $validator->labels([
            'direccion' => 'dirección',
        ]);
        if (!$validator->validate()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'errores' => $validator->errors()
            ], 422);
        }
        try {
            $sucursal = new Sucursal;
            $sucursal->nombre = $datos['nombre'];
            $sucursal->direccion = $datos['direccion'];
            $se_registro = $sucursal->save();
            if ($se_registro) {
                response()->setStatusCode(201);
                return "ok";
            } else {
                response()->setStatusCode(500);
                return "error";
            }
        } catch (\Exception $error) {
            response()->setStatusCode(500);
            return $error->getMessage();
        }
    }

    public function edit($sucursal_id)
    {
        $sucursal = Sucursal::find($sucursal_id);
        return viewOnly('admin/sucursales/edit', [
            'sucursal' => $sucursal
        ]);
    }

    public function update($sucursal_id, Request $request)
    {
        $validator = new Validator($request->getBody());
        $validator->rule('required', 'nombre');
        $validator->rule('required', 'direccion');
        $validator->labels([
            'direccion' => 'dirección',
        ]);
        if (!$validator->validate()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'errores' => $validator->errors()
            ], 422);
        }
        try {
            $sucursal = Sucursal::find($sucursal_id);
            $datos = $request->getBody();
            $sucursal->nombre = $datos['nombre'];
            $sucursal->direccion = $datos['direccion'];
            if ($sucursal->save()) {
                return 'ok';
            } else {
                response()->setStatusCode(500);
                return 'error';
            }
        } catch (\Exception $error) {
            response()->setStatusCode(500);
            return $error->getMessage();
        }
    }

    public function destroy($sucursal_id)
    {
        $sucursal = Sucursal::find($sucursal_id);
        if ($sucursal->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }
}