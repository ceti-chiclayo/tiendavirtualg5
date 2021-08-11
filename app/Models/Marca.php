<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Marca extends Model
{
    use HasSlug;

    protected $table = 'marcas';

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('nombre')->saveSlugsTo('slug');
    }

    // protected static function booted()
    // {
    //     // hacer algo antes de que se registre
    //     static::creating(function ($marca) {
    //         // ingresamos la acciones
    //     });

    //     // cuando ya se creo
    //     static::created(function ($marca) {
    //     });

    //     static::updating(function () {
    //     });

    //     static::updated(function () {
    //     });

    //     static::deleting(function () {
    //     });

    //     static::deleted(function () {
    //     });
    // }
}
