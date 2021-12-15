<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'imagem',
        'slug',
        'status'
    ];


    public function imagens()
    {
        return $this->hasMany(GaleriaImagem::class);
    }
}
