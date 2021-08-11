<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Marca;
use Core\Controller;
use Core\Request;

class MarcaController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/marcas/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $texto_busqueda = $datos['texto_busqueda'];
        $marcas = Marca::where('nombre', 'LIKE', '%' . $texto_busqueda . '%')->get();
        return viewOnly('admin/marcas/search', [
            'marcas' => $marcas
        ]);
    }

    public function create()
    {
        return viewOnly('admin/marcas/create');
    }

    public function store(Request $request)
    {
        $datos = $request->getBody();
        try {
            $marca = new Marca;
            $marca->nombre = $datos['nombre'];
            // $marca->slug = $datos['nombre'];
            $se_registro = $marca->save();
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

    public function edit($marca_id)
    {
        $marca = Marca::find($marca_id);
        return viewOnly('admin/marcas/edit', [
            'marca' => $marca
        ]);
    }

    public function update($marca_id, Request $request)
    {
        try {
            $marca = Marca::find($marca_id);
            $datos = $request->getBody();
            $marca->nombre = $datos['nombre'];
            // $marca->slug = $datos['nombre'];
            if ($marca->save()) {
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

    public function destroy($marca_id)
    {
        $marca = Marca::find($marca_id);
        if ($marca->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
