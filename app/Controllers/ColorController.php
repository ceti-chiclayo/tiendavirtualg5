<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Color;
use Core\Controller;
use Core\Request;

class ColorController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/colores/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $texto_busqueda = $datos['texto_busqueda'];
        $colores = Color::where('nombre', 'LIKE', '%' . $texto_busqueda . '%')->get();
        return viewOnly('admin/colores/search', [
            'colores' => $colores
        ]);
    }

    public function create()
    {
        return viewOnly('admin/colores/create');
    }

    public function store(Request $request)
    {
        $datos = $request->getBody();
        try {
            $color = new Color;
            $color->nombre = $datos['nombre'];
            $color->slug = $datos['nombre'];
            $se_registro = $color->save();
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

    public function edit($color_id)
    {
        $color = Color::find($color_id);
        return viewOnly('admin/colores/edit', [
            'color' => $color
        ]);
    }

    public function update($color_id, Request $request)
    {
        try {
            $color = Color::find($color_id);
            $datos = $request->getBody();
            $color->nombre = $datos['nombre'];
            $color->slug = $datos['nombre'];
            if ($color->save()) {
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

    public function destroy($color_id)
    {
        $color = Color::find($color_id);
        if ($color->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
