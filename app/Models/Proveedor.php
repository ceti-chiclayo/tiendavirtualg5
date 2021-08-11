<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $table = 'proveedores';

    public function getRazonRucAttribute()
    {
        return $this->ruc . ' - ' . $this->razon_social;
    }

}