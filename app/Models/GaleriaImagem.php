<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaImagem extends Model
{
    use HasFactory;

    protected $table = 'galeria_imagens';

    protected $fillable = [
        'galeria_id',
        'imagem',
        'thumbnail',
    ];

    public $timestamps = false;

    public function galeria()
    {
        return $this->belongsTo(Galeria::class);
    }
}
