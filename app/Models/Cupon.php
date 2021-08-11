<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Cupon extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;

    protected $table = 'cupones';

    const TIPOS = ['PORCENTAJE', 'MONTO'];
}