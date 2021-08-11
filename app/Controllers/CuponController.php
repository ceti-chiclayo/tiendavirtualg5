<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Cupon;
use Core\Request;
use Valitron\Validator;

class CuponController extends \Core\Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/cupones/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $texto_busqueda = $datos['texto_busqueda'];
        $cupones = Cupon::where('codigo', 'LIKE', '%' . $texto_busqueda . '%')->get();
        return viewOnly('admin/cupones/search', [
            'cupones' => $cupones
        ]);
    }

    public function create()
    {
        $tipos = Cupon::TIPOS;
        return viewOnly('admin/cupones/create', compact('tipos'));
    }

    public function store(Request $request)
    {
        $datos = $request->getBody();
        $validator = new Validator($datos);
        $validator->rule('required', 'codigo');
        $validator->rule('required', 'tipo');
        $validator->rule('required', 'monto');
        $validator->labels([
            'codigo' => 'código',
        ]);
        if (!$validator->validate()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'errores' => $validator->errors()
            ], 422);
        }
        try {
            $cupon = new Cupon;
            $cupon->codigo = $datos['codigo'];
            $cupon->tipo = $datos['tipo'];
            $cupon->monto = $datos['monto'];
            $se_registro = $cupon->save();
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

    public function edit($cupon_id)
    {
        $cupon = Cupon::find($cupon_id);
        $tipos = Cupon::TIPOS;
        return viewOnly('admin/cupones/edit', [
            'cupon' => $cupon,
            'tipos' => $tipos,
        ]);
    }

    public function update($cupon_id, Request $request)
    {
        $datos = $request->getBody();
        $validator = new Validator($datos);
        $validator->rule('required', 'codigo');
        $validator->rule('required', 'tipo');
        $validator->rule('required', 'monto');
        $validator->labels([
            'codigo' => 'código',
        ]);
        if (!$validator->validate()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'errores' => $validator->errors()
            ], 422);
        }
        try {
            $cupon = Cupon::find($cupon_id);
            $datos = $request->getBody();
            $cupon->codigo = $datos['codigo'];
            $cupon->tipo = $datos['tipo'];
            $cupon->monto = $datos['monto'];
            if ($cupon->save()) {
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

    public function destroy($cupon_id)
    {
        $cupon = Cupon::find($cupon_id);
        if ($cupon->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }
}