<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use App\Models\GaleriaImagem;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    public function index()
    {

        $galerias = Galeria::where('status', 1)->get();
        $imagens = GaleriaImagem::get();

        return view('galeria.index', compact('galerias', 'imagens'));
        
    }
}
