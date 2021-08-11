<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Medida;
use Core\Controller;
use Core\Request;

class MedidaController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/medidas/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $texto_busqueda = $datos['texto_busqueda'];
        $medidas = Medida::where('nombre', 'LIKE', '%' . $texto_busqueda . '%')->get();
        return viewOnly('admin/medidas/search', [
            'medidas' => $medidas
        ]);
    }

    public function create()
    {
        return viewOnly('admin/medidas/create');
    }

    public function store(Request $request)
    {
        $datos = $request->getBody();
        try {
            $medida = new Medida;
            $medida->nombre = $datos['nombre'];
            $se_registro = $medida->save();
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

    public function edit($medida_id)
    {
        $medida = Medida::find($medida_id);
        return viewOnly('admin/medidas/edit', [
            'medida' => $medida
        ]);
    }

    public function update($medida_id, Request $request)
    {
        try {
            $medida = Medida::find($medida_id);
            $datos = $request->getBody();
            $medida->nombre = $datos['nombre'];
            if ($medida->save()) {
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

    public function destroy($medida_id)
    {
        $medida = Medida::find($medida_id);
        if ($medida->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
