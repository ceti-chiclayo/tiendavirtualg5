<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Categoria extends Model
{
    use HasSlug;
    use SoftDeletes;

    protected $table = 'categorias';

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nombre')
            ->saveSlugsTo('slug');
    }

    public function productosPorCategoria()
    {
        return $this->hasManyThrough(Producto::class, Categoria::class, 'categoria_id', 'categoria_id');
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'categoria_id');
    }

    /**
     * Relación recursiva de uno a muchos
     *
     * @return BelongsTo
     */
    public function categoriaPadre()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function getImagenUrlAttribute()
    {
        if (is_null($this->imagen)) {
            return "/imagenes/categorias/default-placeholder.png";
        }
        return "/imagenes/categorias/" . $this->imagen;
    }
}
