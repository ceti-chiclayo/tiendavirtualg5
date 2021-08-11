<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Cliente;
use Core\Controller;
use Core\Request;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/clientes/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $texto_busqueda = $datos['texto_busqueda'];
        $clientes = Cliente::where(function ($query) use ($texto_busqueda) {
            $query->where('apellido_paterno', 'LIKE', '%' . $texto_busqueda . '%')
                ->orWhere('apellido_materno', 'LIKE', '%' . $texto_busqueda . '%')
                ->orWhere('nombres', 'LIKE', '%' . $texto_busqueda . '%');
        })->orderBy('apellido_paterno', 'ASC')
            ->orderBy('apellido_materno', 'ASC')
            ->orderBy('nombres', 'ASC')->get();
        return viewOnly('admin/clientes/search', [
            'clientes' => $clientes
        ]);
    }

    public function create()
    {
        return viewOnly('admin/clientes/create');
    }

    public function store(Request $request)
    {
        $datos = $request->getBody();
        try {
            $marca = new Cliente;
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
        $marca = Cliente::find($marca_id);
        return viewOnly('admin/clientes/edit', [
            'marca' => $marca
        ]);
    }

    public function update($marca_id, Request $request)
    {
        try {
            $marca = Cliente::find($marca_id);
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
        $marca = Cliente::find($marca_id);
        if ($marca->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
