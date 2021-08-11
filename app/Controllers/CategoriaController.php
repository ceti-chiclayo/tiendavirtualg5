<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Categoria;
use App\Services\ImageFileService;
use Core\Controller;
use Core\Request;
use Valitron\Validator;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/categorias/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $texto_busqueda = $datos['texto_busqueda'];
        $categorias = Categoria::whereNull('categoria_id')
            ->where('nombre', 'LIKE', '%' . $texto_busqueda . '%')->get();
        return viewOnly('admin/categorias/search', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Función para mostrar formulario de registro
     *
     * @return string
     */
    public function create()
    {
        return viewOnly('admin/categorias/create');
    }

    public function store(Request $request)
    {
        $validator = new Validator($request->getBody());
        $validator->rule('required', 'nombre');
        if (!$validator->validate()) {
            $data = [
                'message' => 'Errores de validación',
                'errors' => $validator->errors()
            ];
            return response()->json($data, 422);
        }
        try {
            $imagen = $request->files->get('imagen');
            $ruta_destino = __DIR__ . "/../../files/public/categorias";
            $nombre_imagen = ImageFileService::upload($ruta_destino, $imagen);

            $categoria = new Categoria;
            $categoria->nombre = $request->get('nombre');
            $categoria->imagen = $nombre_imagen;
            $se_registro = $categoria->save();
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

    public function edit($categoria_id)
    {
        $categoria = Categoria::find($categoria_id);
        return viewOnly('admin/categorias/edit', [
            'categoria' => $categoria
        ]);
    }

    public function update($categoria_id, Request $request)
    {
        try {
            $categoria = Categoria::find($categoria_id);
            $datos = $request->getBody();
            $categoria->nombre = $datos['nombre'];
            if ($categoria->save()) {
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
        $categoria = Categoria::find($categoria_id);
        if ($categoria->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }

    public function reportePdf()
    {
        $categorias = Categoria::all();
        require \Core\Application::$ROOT_DIR . "/views/admin/categorias/exports/listPdf.php";
    }

    public function reporteExcel()
    {
        $categorias = Categoria::all();
        require \Core\Application::$ROOT_DIR . "/views/admin/categorias/exports/listExcel.php";
    }
}
