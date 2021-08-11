<?php

namespace App\Services;

class CarritoService
{

    /**
     * Calcular el valor del cupón
     *
     * @return void
     */
    public static function valorCupon(): float
    {
        $cupon = session()->get('cupon');
        if ($cupon === false) {
            return 0.00;
        }
        $valor = 0.00;
        if ($cupon->tipo === 'MONTO') {
            $valor = $cupon->monto;
        } else if ($cupon->tipo === 'PORCENTAJE') {
            $valor = self::subtotal() * ($cupon->monto / 100);
        }
        return $valor;
    }

    public static function subtotal(): float
    {
        $carrito = session()->get('carrito', []);
        $total = 0.00;
        foreach ($carrito as $item) {
            $cantidad = $item['cantidad'];
            $precio_unitario = $item['presentacion']->precio;
            $subtotal = $cantidad * $precio_unitario;
            $total = $total + $subtotal;
        }
        return $total;
    }

    public static function total(): float
    {
        return self::subtotal() - self::valorCupon();
    }

    public static function agregarItem($presentacion, $cantidad)
    {
        $carrito = session()->get('carrito', []);
        $indice = false;
        // verificar si presentacion fue agregado correctamente        
        foreach ($carrito as $key => $item) {
            if ($item['presentacion']->id == $presentacion->id) {
                $indice = $key;
            }
        }
        if ($indice !== false) {
            $carrito[$indice] = [
                'cantidad' => $cantidad,
                'presentacion' => $presentacion
            ];
        } else {
            $carrito[] = [
                'cantidad' => $cantidad,
                'presentacion' => $presentacion
            ];
        }
        session()->set('carrito', $carrito);
    }

    public static function verificarExiste($presentacion)
    {
        $carrito = session()->get('carrito', []);
        foreach ($carrito as $item) {
            if ($item['presentacion']->id == $presentacion->id) {
                return $item['cantidad'];
            }
        }
        return 0;
    }

    public static function quitarItem($indice)
    {
        $carrito = session()->get('carrito', []);
        unset($carrito[$indice]);
        session()->set('carrito', $carrito);
    }

    public static function numeroItems(): int
    {
        $carrito = session()->get('carrito', []);
        return count($carrito);
    }

    public static function limpiar()
    {
        session()->set('carrito', []);
    }
}
