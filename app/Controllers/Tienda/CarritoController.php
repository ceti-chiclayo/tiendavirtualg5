<?php

namespace App\Controllers\Tienda;

use App\Models\Cupon;
use App\Models\Presentacion;
use App\Models\SucursalDetalle;
use App\Services\CarritoService;
use Core\Controller;
use Core\Request;
use Valitron\Validator;

class CarritoController extends Controller
{

    public function inicio()
    {
        $this->setLayout('tienda');
        return view('tienda/cart');
    }

    public function agregarItem(Request $request)
    {
        $validator = new Validator($request->getBody());
        $validator->rule('required', 'producto_id')->label('Producto');
        $validator->rule('required', 'color_id')->label('Color');
        $validator->rule('required', 'medida_id')->label('Medida');
        $validator->rule('required', 'cantidad')->label('Cantidad');

        if (!$validator->validate()) {
            $data = [
                'errores' => $validator->errors(),
                'message' => 'Datos faltantes'
            ];
            return response()->json($data, 422);
        }

        $producto_id = $request->get('producto_id');
        $color_id = $request->get('color_id');
        $medida_id = $request->get('medida_id');
        $cantidad = $request->get('cantidad');

        $presentacion = Presentacion::where('producto_id', $producto_id)
            ->where('medida_id', $medida_id)
            ->where('color_id', $color_id)
            ->first();

        // validar si presentacion existe
        if (is_null($presentacion)) {
            return response()->json(['message' => 'Presentación no existe'], 422);
        }

        // verificar si existe el item, verificar stock en base a la nueva cantidad
        $cantidad_actual = CarritoService::verificarExiste($presentacion) + (float)$cantidad;

        // verificar stock
        $cantidad_disponible = SucursalDetalle::where('presentacion_id', $presentacion->id)
            ->sum('cantidad');

        if ($cantidad_disponible < $cantidad_actual) {
            return response()->json(['message' => 'Stock no disponible'], 409);
        }
        // agregar item
        CarritoService::agregarItem($presentacion, $cantidad_actual);

        // si todo ok
        $data = [
            'message' => 'Item agregado correctamente'
        ];
        return response()->json($data, 200);
    }

    public function calcularTotal()
    {
        return response()->json(['total' => number_format(CarritoService::total(), 2, '.', '')], 200);
    }

    public function quitarItem(Request $request)
    {
        $indice_item = $request->get('indice');
        CarritoService::quitarItem($indice_item);
        return response()->json(['message' => 'Item eliminado correctamente', 200]);
    }

    public function actualizarCantidadPorItem(Request $request)
    {
        $indice_item = $request->get('indice');
    }

    public function limpiarCarrito()
    {
        CarritoService::limpiar();
        return response()->json(['message' => 'Items eliminados correctamente', 200]);
    }

    public function actualizarMinicart()
    {
        $carrito = session()->get('carrito', []);
        $total = CarritoService::total();
        $numero_items = CarritoService::numeroItems();
        return viewOnly('tienda/carrito/mini-cart', compact('carrito', 'total', 'numero_items'));
    }

    public function cantidadItems()
    {
        return response()->json(['cantidad' => CarritoService::numeroItems()], 200);
    }

    public function generarTabla()
    {
        $carrito = session()->get('carrito', []);
        $cupon = session()->get('cupon', false);
        $valor_cupon = number_format(CarritoService::valorCupon(), 2, '.', '');
        $subtotal = number_format(CarritoService::subtotal(), 2, '.', '');
        $total = number_format(CarritoService::total(), 2, '.', '');
        return viewOnly('tienda/carrito/tabla-carrito', compact('carrito', 'total', 'cupon', 'subtotal', 'valor_cupon'));
    }

    public function aplicarCupon(Request $request)
    {
        $codigo = $request->get('codigo_cupon');
        $cupon = Cupon::firstWhere('codigo', $codigo);
        // cupon existe
        if (is_null($cupon)) {
            return response()->json(['message' => 'Código de cupón inválido'], 409);
        }
        // verificar si ya tiene un cupon
        if (session()->get('cupon', false) !== false) {
            return response()->json(['message' => 'No se puede aplicar mas de un cupón por venta'], 409);
        }
        // no aplicando dos o mas veces el mismo cupon
        if (session()->get('cupon', false) !== false) {
            if ($cupon->codigo == session()->get('cupon')->codigo) {
                return response()->json(['message' => 'No se puede aplicar dos veces el mismo cupón'], 409);
            }
        }
        session()->set('cupon', $cupon);
        return response()->json(['meesage' => 'Cupón aplicado correctamente'], 200);
    }

    public function limpiarCupon()
    {
        session()->remove('cupon');
    }
}
