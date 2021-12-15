<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Galeria;
use App\Models\GaleriaImagem;

class HomeController extends Controller
{

    public function index()
    {

        $banners = Banner::all();

        $galerias = Galeria::where('status', 1)->get();
        $imagens = GaleriaImagem::get();


        return view('home.index', compact('banners', 'galerias', 'imagens'));
    }
}
