<?php

namespace App\Controllers\Tienda;

use App\Models\Sucursal;
use App\Models\SucursalDetalle;
use Core\Controller;
use Core\Request;
use Culqi\Culqi;

class PagarController extends Controller
{

    public function inicio()
    {
        $this->setLayout('tienda');
        return view('tienda/checkout');
    }

    // crear un cargo
    public function culqi(Request $request)
    {
        // aqui realizar verificacion de stock de cada item del carrito

        $total = 11000;
        $email = auth()->user()->email;
        $token = $request->get('token');
        $llave_privada = 'sk_test_xmKEI36w35G3UAT6';
        $culqi = new Culqi(['api_key' => $llave_privada]);

        // realizando el cobro
        $cargo = $culqi->Charges->create(
            [
                "amount" => $total,
                "currency_code" => "PEN",
                "email" => $email,
                "source_id" => $token
            ]
        );
        if (isset($cargo->id)) {
            // cobro realizado correctamente

            // aqui se registra el pedido
            // response()->redirect('/carrito');
            // Iniciar una transaccion;
            // 1er paso: Registramos el pedido (guardar el token y el id)
            // 2do paso: Registrar el detalle del pedido
            // 2.1 paso: Descontar stock
            // Confirmar la transaccion
            // enviar el correo de confirmacion del pedido
            // * notificar en tiempo real al usuario administrador
            $carrito = session()->get('carrito', []);
            foreach ($carrito as $item) {
                $presentacion = $item['presentacion'];
                $cantidad = $item['cantidad'];
                // Sucursales
                $sucursales = Sucursal::all();
                // $sucursales = Sucursal::orderBy('prioridad', 'ASC')->get();
                $cantidad_necesaria = $cantidad; // 5
                // 0,0,0
                foreach ($sucursales as $sucursal) {
                    $stock = SucursalDetalle::where('presentacion_id', $presentacion->id)
                        ->where('sucursal_id', $sucursal->id)->first();
                    // exista un registro
                    if (is_null($stock)) {
                        continue;
                    }
                    // la cantidad sea mayor a 0
                    if ($stock->cantidad == 0) {
                        continue;
                    }
                    $cantidad_disponible = $stock->cantidad; // 6
                    if (($cantidad_necesaria - $cantidad_disponible) > 0) {
                        SucursalDetalle::modificarStock($presentacion->id, $cantidad_disponible, $sucursal->id);
                    } else {
                        SucursalDetalle::modificarStock($presentacion->id, $cantidad_necesaria, $sucursal->id);
                        break;
                    }
                    $cantidad_necesaria = $cantidad_necesaria - $cantidad_disponible;
                }
            }
            session()->remove('carrito');
            session()->remove('cupon');
            return response()->json(['message' => 'Pago realizado correctamente'], 200);
        } else {
            // considerar el error
            // response()->redirect('/pagar');
            return response()->json(['message' => 'Error interno al realizar el pago'], 500);
        }
    }

    public function mercadopago()
    {
    }

    public function payu()
    {
    }
}
