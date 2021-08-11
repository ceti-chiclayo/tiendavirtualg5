<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use SoftDeletes;

    protected $table = 'colores';

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'presentaciones', 'color_id', 'producto_id');
    }
}
