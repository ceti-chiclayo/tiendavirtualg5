<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SucursalDetalle extends Model
{
    use SoftDeletes;

    protected $table = 'sucursal_detalle';

    /**
     * @param $presentacion_id
     * @param $cantidad
     * @param $sucursal_id
     * @param string $tipo
     */
    public static function modificarStock($presentacion_id, $cantidad, $sucursal_id, $tipo = 'disminuir')
    {
        $stock = self::where('presentacion_id', $presentacion_id)
            ->where('sucursal_id', $sucursal_id)
            ->first();
        if (is_null($stock)) {
            $stock = self::create([
                'presentacion_id' => $presentacion_id,
                'sucursal_id' => $sucursal_id,
                'cantidad' => 0
            ]);
        }
        $stock_actual = $stock->cantidad;
        if ($tipo === 'disminuir') {
            $stock_actual = $stock_actual - $cantidad;
        } else if ($tipo === 'aumentar') {
            $stock_actual = $stock_actual + $cantidad;
        }
        // actualizar
        $stock->cantidad = $stock_actual;
        $stock->save();
    }
}
