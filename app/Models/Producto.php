<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Producto extends Model
{
    use SoftDeletes;
    use HasSlug;

    protected $table = 'productos';

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('titulo')
            ->saveSlugsTo('slug');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function imagenes()
    {
        return $this->hasMany(ImagenProducto::class, 'producto_id');
    }

    public function getPrimeraImagenAttribute()
    {
        $imagenes = $this->imagenes()->orderBy('id', 'ASC')->get();
        if (count($imagenes) > 0) {
            foreach ($imagenes as $imagen) {
                return $imagen->imagen_url;
            }
        }
        return "/imagenes/productos/default-placeholder.png";
    }

    public function getPrimeraImagenObjetoAttribute()
    {
        $imagenes = $this->imagenes()->orderBy('id', 'ASC')->get();
        if (count($imagenes) > 0) {
            foreach ($imagenes as $imagen) {
                return $imagen;
            }
        }
    }

    public static function scopeListar($query, $categoria, $subcategoria, $marca, $page)
    {
        return $query->join('marcas', 'productos.marca_id', '=', 'marcas.id')
            ->join('categorias AS subcategorias', 'productos.categoria_id', '=', 'subcategorias.id')
            ->join('categorias AS categorias_padre', 'subcategorias.categoria_id', '=', 'categorias_padre.id')
            ->where(function ($subquery) use ($marca) {
                if (!is_null($marca)) {
                    $subquery->where('marcas.slug', $marca);
                }
            })
            ->where(function ($subquery) use ($categoria) {
                if (!is_null($categoria)) {
                    $subquery->where('categorias_padre.slug', $categoria);
                }
            })
            ->where(function ($subquery) use ($subcategoria) {
                if (!is_null($subcategoria)) {
                    $subquery->where('subcategorias.slug', $subcategoria);
                }
            })->select('productos.*')->offset($page)->limit(18)->get();
    }

    public function getSegundaImagenAttribute()
    {
        // select * from imagenes LIMIT 10 OFFSET 5
        $imagenes = $this->imagenes()->orderBy('id', 'ASC')->get();
        if (count($imagenes) > 1) {
            $contador = 1;
            foreach ($imagenes as $imagen) {
                if ($contador == 2) {
                    return $imagen->imagen_url;
                }
                $contador++;
            }
        }
        return "";
    }

    public function presentaciones()
    {
        return $this->hasMany(Presentacion::class, 'producto_id');
    }

    public function medidas()
    {
        return $this->belongsToMany(Medida::class, 'presentaciones', 'producto_id', 'medida_id');
    }

    public function colores()
    {
        return $this->belongsToMany(Color::class, 'presentaciones', 'producto_id', 'color_id');
    }
}
