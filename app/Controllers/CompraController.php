<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Presentacion;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use App\Models\SucursalDetalle;
use Core\Request;
use Valitron\Validator;
use Illuminate\Database\Capsule\Manager as DB;

class CompraController extends \Core\Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }

    public function index(): string
    {
        $this->setLayout('app');
        return view('admin/compras/index');
    }

    public function search(Request $request)
    {
        $datos = $request->getBody();
        $validator = new Validator($datos);
        $validator->rule('required', 'fecha_inicio');
        $validator->rule('required', 'fecha_fin');
        $validator->rule('dateFormat', 'fecha_inicio', 'Y-m-d');
        $validator->rule('dateFormat', 'fecha_fin', 'Y-m-d');
        $validator->labels([
            'fecha_inicio' => 'Fecha de inicio',
            'fecha_fin' => 'Fecha de fin',
        ]);
        if (!$validator->validate()) {
            return response()->json(['errores' => $validator->errors()], 422);
        }
        $fecha_inicio = $datos['fecha_inicio'];
        $fecha_fin = $datos['fecha_fin'];
        $compras = Compra::where(function ($query) use ($fecha_inicio, $fecha_fin) {
            $query->where('fecha', '>=', $fecha_inicio)->where('fecha', '<=', $fecha_fin);
        })->orderBy('fecha', 'ASC')->orderBy('created_at', 'ASC')->get();
        return viewOnly('admin/compras/search', [
            'compras' => $compras
        ]);
    }

    public function create()
    {
        session()->set('detalle_compra', []);
        $this->setLayout('app');
        $proveedores = Proveedor::select('id', 'razon_social', 'ruc')->get();
        $sucursales = Sucursal::select('id', 'nombre')->get();
        return view('admin/compras/create', compact('proveedores', 'sucursales'));
    }

    public function listarDetalle()
    {
        $detalle = session()->get('detalle_compra', []);
        return viewOnly('admin/compras/crear/listar_detalle', compact('detalle'));
    }

    public function formAgregarItem()
    {
        $productos = Producto::select('titulo', 'id')->orderBy('titulo', 'ASC')->get();
        return viewOnly('admin/compras/crear/agregar_item', compact('productos'));
    }

    public function formEditarItem($indice)
    {
        $carrito = session()->get('detalle_compra', []);
        $presentacion = $carrito[$indice]['presentacion'];
        $producto = $carrito[$indice]['producto'];
        $item = $carrito[$indice];
        $productos = Producto::select('titulo', 'id')->orderBy('titulo', 'ASC')->get();
        $presentaciones = $producto->presentaciones;
        $posicion = $indice;
        return viewOnly('admin/compras/crear/editar_item', compact('presentacion', 'posicion', 'producto', 'productos', 'presentaciones', 'item'));
    }

    public function agregarItem(Request $request)
    {
        $validator = new Validator($request->getBody());
        $validator->rule('required', 'presentacion_id');
        $validator->rule('required', 'producto_id');
        $validator->rule('required', 'cantidad');
        $validator->rule('required', 'precio_unitario');
        $validator->labels([
            'presentacion_id' => 'Presentación de producto',
            'producto_id' => 'Producto',
        ]);
        if (!$validator->validate()) {
            return response()->json(['errores' => $validator->errors()], 422);
        }
        $carrito = session()->get('detalle_compra', []);
        $datos = $request->getBody();
        $carrito[] = [
            'presentacion' => Presentacion::find($datos['presentacion_id']),
            'producto' => Producto::find($datos['producto_id']),
            'cantidad' => $datos['cantidad'],
            'precio_unitario' => $datos['precio_unitario'],
        ];
        session()->set('detalle_compra', $carrito);
        return response()->json(['message' => 'Item agregado correctamente'], 201);
    }

    public function actualizarItem($indice, Request $request)
    {
        $validator = new Validator($request->getBody());
        $validator->rule('required', 'presentacion_id');
        $validator->rule('required', 'producto_id');
        $validator->rule('required', 'cantidad');
        $validator->rule('required', 'precio_unitario');
        $validator->labels([
            'presentacion_id' => 'Presentación de producto',
            'producto_id' => 'Producto',
        ]);
        if (!$validator->validate()) {
            return response()->json(['errores' => $validator->errors()], 422);
        }
        $carrito = session()->get('detalle_compra', []);
        $datos = $request->getBody();
        $carrito[$indice] = [
            'presentacion' => Presentacion::find($datos['presentacion_id']),
            'producto' => Producto::find($datos['producto_id']),
            'cantidad' => $datos['cantidad'],
            'precio_unitario' => $datos['precio_unitario'],
        ];
        session()->set('detalle_compra', $carrito);
        return response()->json(['message' => 'Item modificado correctamente'], 201);
    }

    public function eliminarItem($indice)
    {
        $carrito = session()->get('detalle_compra', []);
        unset($carrito[$indice]);
        session()->set('detalle_compra', $carrito);
        return response()->json(['message' => 'Item eliminado correctamente'], 200);
    }

    public function store(Request $request)
    {
        $validator = new Validator($request->getBody());
        $validator->rule('required', 'proveedor_id');
        $validator->rule('required', 'sucursal_id');
        $validator->rule('required', 'fecha');
        $validator->labels([
            'proveedor_id' => 'Proveedor',
            'sucursal_id' => 'Sucursal'
        ]);
        if (!$validator->validate()) {
            return response()->json([
                'message' => 'Error en la validación de datos',
                'errores' => $validator->errors()
            ], 422);
        }
        if (count(session()->get('detalle_compra', [])) === 0) {
            return response()->json([
                'message' => 'Debe agregar detalle a la compra',
            ], 409);
        }
        $datos = $request->getBody();
        DB::beginTransaction();
        try {
            $datos = $request->getBody();
            $compra = new Compra();
            $compra->fecha = $datos['fecha'];
            $compra->total = 0.00;
            $compra->proveedor_id = $datos['proveedor_id'];
            $compra->sucursal_id = $datos['sucursal_id'];
            $compra->save();

            $detalle = session()->get('detalle_compra', []);
            $total = 0.00;
            foreach ($detalle as $item) {
                $detalle_compra = new DetalleCompra();
                $detalle_compra->presentacion_id = $item['presentacion']->id;
                $detalle_compra->cantidad = $item['cantidad'];
                $detalle_compra->precio_unitario = $item['precio_unitario'];
                $detalle_compra->compra_id = $compra->id;
                $detalle_compra->save();
                $total = $total + ($detalle_compra->cantidad * $detalle_compra->precio_unitario);
                // alterar stock
                SucursalDetalle::modificarStock($detalle_compra->presentacion_id, $detalle_compra->cantidad, $compra->sucursal_id, 'aumentar');
            }
            $compra->total = $total;
            $compra->save();
            DB::commit();
            session()->remove('detalle_compra');
            return response()->json(['message' => 'Compra registradad correctamente'], 201);
        } catch (\Exception $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], 500);
        }
    }

    public function edit($compra_id)
    {
        $compra = Compra::find($compra_id);
        return viewOnly('admin/compras/edit', [
            'compra' => $compra
        ]);
    }

    public function update($compra_id, Request $request)
    {
        try {
            $compra = Compra::find($compra_id);
            $datos = $request->getBody();
            $compra->nombre = $datos['nombre'];
            // $compra->slug = $datos['nombre'];
            if ($compra->save()) {
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

    public function destroy($compra_id)
    {
        $compra = Compra::find($compra_id);
        if ($compra->delete()) {
            return "ok";
        } else {
            return "error";
        }
    }

    public function cargarPresentaciones($producto_id)
    {
        $presentaciones = Presentacion::where('producto_id', $producto_id)->get();
        $codigo_html = "<option value=''>Seleccione</option>";
        foreach ($presentaciones as $presentacion) {
            $codigo_html = $codigo_html . "<option value='" . $presentacion->id . "'>" . $presentacion->titulo_corto . "</option>";
        }
        return $codigo_html;
    }
}