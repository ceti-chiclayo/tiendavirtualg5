<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Categoria;
use Core\Controller;
use Core\Request;

class SubCategoriaController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/subcategorias/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $texto_busqueda = $datos['texto_busqueda'];
        $subcategorias = Categoria::whereNotNull('categoria_id')
            ->where('nombre', 'LIKE', '%' . $texto_busqueda . '%')
            ->orderBy('categoria_id', 'ASC')->get();
        return viewOnly('admin/subcategorias/search', [
            'subcategorias' => $subcategorias
        ]);
    }

    /**
     * Función para mostrar formulario de registro
     *
     * @return string
     */
    public function create()
    {
        $categorias = Categoria::whereNull('categoria_id')->get();
        return viewOnly('admin/subcategorias/create', [
            'categorias' => $categorias
        ]);
    }

    public function store(Request $request)
    {
        try {
            $subcategoria = new Categoria;
            $subcategoria->nombre = $request->get('nombre');
            $subcategoria->categoria_id = $request->get('categoria_id');
            if ($subcategoria->save()) {
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

    public function edit($categoria_id)
    {
        $subcategoria = Categoria::find($categoria_id);
        return viewOnly('admin/subcategorias/edit', [
            'subcategoria' => $subcategoria
        ]);
    }

    public function update($categoria_id, Request $request)
    {
        try {
            $subcategoria = Categoria::find($categoria_id);
            $datos = $request->getBody();
            $subcategoria->nombre = $datos['nombre'];
            if ($subcategoria->save()) {
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

    public function destroy($categoria_id)
    {
        $subcategoria = Categoria::find($categoria_id);
        if ($subcategoria->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }

    public function reportePdf()
    {
        $subcategorias = Categoria::all();
        require \Core\Application::$ROOT_DIR . "/views/admin/subcategorias/exports/listPdf.php";
    }

    public function reporteExcel()
    {
        $subcategorias = Categoria::all();
        require \Core\Application::$ROOT_DIR . "/views/admin/subcategorias/exports/listExcel.php";
    }
}
