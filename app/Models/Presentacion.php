<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presentacion extends Model
{

    use SoftDeletes;

    protected $table = 'presentaciones';

    // precio_venta
    public function getPrecioAttribute()
    {
        if (!is_null($this->precio_oferta)) {
            return $this->precio_oferta;
        } else if (!is_null($this->porcentaje_descuento)) {
            return $this->precio_venta - ($this->precio_venta * $this->porcentaje_descuento) / 100;
        } else {
            return $this->precio_venta;
        }
    }

    public function getTituloAttribute($key)
    {
        return $this->producto->titulo . '<br>(' . $this->medida->nombre . ' - ' . $this->color->nombre . ')';
    }

    public function getTituloListadoAttribute($key)
    {
        return $this->producto->titulo . '(' . $this->medida->nombre . ' - ' . $this->color->nombre . ')';
    }

    public function getTituloCortoAttribute($key)
    {
        return $this->medida->nombre . ' - ' . $this->color->nombre;
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function medida()
    {
        return $this->belongsTo(Medida::class, 'medida_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
