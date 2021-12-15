<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaAtuacao extends Model
{
    use HasFactory;

    protected $table = 'areas_atuacao';

    protected $fillable = [
        'titulo',
        'imagem',
        'texto',
        'slug'
    ];
}
