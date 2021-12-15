<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Galeria;
use App\Models\GaleriaImagem;
use App\Models\Parceiro;
use App\Models\AreaAtuacao;
use App\Models\Video;

class HomeController extends Controller
{

    public function index()
    {

        $banners = Banner::all();

        $galerias = Galeria::where('status', 1)->get();
        $imagens = GaleriaImagem::get();
        $parceiros = Parceiro::all();
        $areas = AreaAtuacao::limit(5)->get();

        $videos = Video::limit(2)->get();

        return view('home.index', compact('banners', 'galerias', 'imagens', 'parceiros', 'areas', 'videos'));
    }
}
