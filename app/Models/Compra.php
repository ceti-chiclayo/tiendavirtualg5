<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $table = 'compras';

    public function detalle()
    {
        return $this->hasMany(DetalleCompra::class, 'compra_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }
}