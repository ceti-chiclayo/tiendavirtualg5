<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleCompra extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $table = 'detalle_compra';

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'compra_id');
    }

    public function presentacion()
    {
        return $this->belongsTo(Presentacion::class, 'presentacion_id');
    }

    public function getMontoAttribute()
    {
        return number_format($this->cantidad * $this->precio_unitario, '2', '.', '');
    }
}