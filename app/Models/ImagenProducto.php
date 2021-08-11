<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    protected $table = 'imagenes_producto';
    public $timestamps = false;

    public function getImagenUrlAttribute()
    {
        if (is_null($this->nombre)) {
            return "/imagenes/productos/default-placeholder.png";
        }
        return "/imagenes/productos/" . $this->nombre;
    }

    public function getImagenUrlAncho($ancho)
    {
        $datos_imagen = explode('.', $this->nombre);
        $nombre = $datos_imagen[0] . 'x' . $ancho;
        $extension = $datos_imagen[1];
        return "/imagenes/productos/" . $nombre . "." . $extension;
    }
}
