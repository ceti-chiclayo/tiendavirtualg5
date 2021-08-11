<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Proveedor;
use Core\Request;

class ProveedorController extends \Core\Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/proveedores/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $texto_busqueda = $datos['texto_busqueda'];
        $proveedores = Proveedor::where('razon_social', 'LIKE', '%' . $texto_busqueda . '%')->orderBy('razon_social', 'ASC')->get();
        return viewOnly('admin/proveedores/search', [
            'proveedores' => $proveedores
        ]);
    }

    public function create()
    {
        return viewOnly('admin/proveedores/create');
    }

    public function store(Request $request)
    {
        $datos = $request->getBody();
        try {
            $marca = new Proveedor;
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
        $marca = Proveedor::find($marca_id);
        return viewOnly('admin/proveedores/edit', [
            'marca' => $marca
        ]);
    }

    public function update($marca_id, Request $request)
    {
        try {
            $marca = Proveedor::find($marca_id);
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
        $marca = Proveedor::find($marca_id);
        if ($marca->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }
}