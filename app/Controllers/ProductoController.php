<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Categoria;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Medida;
use App\Models\Presentacion;
use App\Models\Producto;
use Core\Controller;
use Core\Request;
use Illuminate\Database\Capsule\Manager as DB;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/productos/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $texto_busqueda = $datos['texto_busqueda'];
        $productos = Producto::where('titulo', 'LIKE', '%' . $texto_busqueda . '%')->get();
        return viewOnly('admin/productos/search', [
            'productos' => $productos
        ]);
    }

    public function create()
    {
        session()->set('carrito_presentaciones', []);
        $this->setLayout('app');
        $categorias = Categoria::whereNull('categoria_id')->get();
        $marcas = Marca::all();
        return view('admin/productos/create', [
            'categorias' => $categorias,
            'marcas' => $marcas
        ]);
    }

    public function store(Request $request)
    {
        $datos = $request->getBody(); // datos del formulario
        // Iniciar la transaccion
        DB::beginTransaction();
        try {
            // registrar el producto
            $producto = new Producto();
            $producto->descripcion_corta = $datos['descripcion_corta'];
            $producto->descripcion_larga = $datos['descripcion_larga'];
            $producto->titulo = $datos['titulo'];
            $producto->marca_id = $datos['marca_id'];
            $producto->categoria_id = $datos['subcategoria_id'];
            $producto->save();
            // registrar presentaciones
            $carrito_presentaciones = session()->get('carrito_presentaciones', []);
            foreach ($carrito_presentaciones as $item) {
                $presentacion = new Presentacion();
                $presentacion->precio_venta = $item['precio_venta'];
                $presentacion->precio_oferta = $item['precio_oferta'];
                $presentacion->codigo = $item['codigo'];
                $presentacion->precio_compra = $item['precio_venta'];
                $presentacion->porcentaje_descuento = $item['porcentaje_descuento'];
                $presentacion->color_id = $item['color_id'];
                $presentacion->medida_id = $item['medida_id'];
                $presentacion->producto_id = $producto->id;
                $presentacion->save();
            }
            DB::commit(); // confirmamos la transaccion
            // limpiar el carrito
            session()->remove('carrito_presentaciones');
            return response()->json(['mensaje' => 'Registrado correctamente'], 201);
        } catch (\Exception $error) {
            DB::rollback(); // deshacer los cambios en caso de error
            return response()->json(['mensaje' => $error->getMessage()], 500);
        }
    }

    public function edit($producto_id)
    {
    }

    public function update($producto_id, Request $request)
    {
    }

    public function destroy($producto_id)
    {
    }

    // metodos para presentaciones

    public function createListarPresentaciones()
    {
        $carrito_presentaciones = session()->get('carrito_presentaciones', []);
        return viewOnly('admin/productos/create/list_presentaciones', [
            'presentaciones' => $carrito_presentaciones
        ]);
    }

    public function createModalPresentacion()
    {
        $medidas = Medida::all();
        $colores = Color::all();
        return viewOnly('admin/productos/create/create_presentacion', [
            'medidas' => $medidas,
            'colores' => $colores,
        ]);
    }

    public function modalEditPresentacion($position)
    {
        $medidas = Medida::all();
        $colores = Color::all();
        $carrito_presentaciones = session()->get('carrito_presentaciones', []);
        $item = $carrito_presentaciones[$position];
        return viewOnly('admin/productos/create/edit_presentacion', [
            'item' => $item,
            'colores' => $colores,
            'medidas' => $medidas,
            'posicion' => $position
        ]);
    }

    public function addPresentacion(Request $request)
    {
        $datos = $request->getBody();
        $item = [
            'codigo' => $datos['codigo'],
            'precio_venta' => $datos['precio_venta'],
            'precio_oferta' => $datos['precio_oferta'],
            'porcentaje_descuento' => $datos['porcentaje_descuento'],
            'precio_compra' => $datos['precio_compra'],
            'medida_id' => $datos['medida_id'],
            'medida_nombre' => Medida::find($datos['medida_id'])->nombre,
            'color_id' => $datos['color_id'],
            'color_nombre' => Color::find($datos['color_id'])->nombre
        ];
        $carrito_presentaciones = session()->get('carrito_presentaciones', []);
        $carrito_presentaciones[] = $item;
        session()->set('carrito_presentaciones', $carrito_presentaciones);
        $respuesta = [
            // 'mensaje' => 'Presentación agregada correctamente ñ } @ % "MENSAJE" &',
            'mensaje' => 'Presentación agregada correctamente',
            'success' => true
        ];
        return response()->json($respuesta, 200);
        // 200 -299 => then
        // 400 - 599 => catch
    }

    public function editPresentacion($position, Request $request)
    {
        $carrito_presentaciones = session()->get('carrito_presentaciones', []);
        $datos = $request->getBody();
        $item = [
            'codigo' => $datos['codigo'],
            'precio_venta' => $datos['precio_venta'],
            'precio_oferta' => $datos['precio_oferta'],
            'porcentaje_descuento' => $datos['porcentaje_descuento'],
            'precio_compra' => $datos['precio_compra'],
            'medida_id' => $datos['medida_id'],
            'medida_nombre' => Medida::find($datos['medida_id'])->nombre,
            'color_id' => $datos['color_id'],
            'color_nombre' => Color::find($datos['color_id'])->nombre
        ];
        $carrito_presentaciones[$position] = $item;
        session()->set('carrito_presentaciones', $carrito_presentaciones);
        $respuesta = [
            'mensaje' => 'Presentación modificada correctamente',
            'success' => true
        ];
        return response()->json($respuesta, 200);
    }

    public function removePresentacion($position)
    {
        $carrito_presentaciones = session()->get('carrito_presentaciones', []);
        unset($carrito_presentaciones[$position]);
        session()->set('carrito_presentaciones', $carrito_presentaciones);
        return response()->json(['mensaje' => 'Se quito la presentacion correctamente'], 200);
    }

    public function loadSubcategorias($categoria_id)
    {
        $subcategorias = Categoria::where('categoria_id', $categoria_id)->get();
        $codigo_html = "<option value=''>Seleccione</option>";
        foreach ($subcategorias as $subcategoria) {
            $codigo_html = $codigo_html . "<option value='" . $subcategoria->id . "'>" . $subcategoria->nombre . "</option>";
        }
        return $codigo_html;
    }
}
