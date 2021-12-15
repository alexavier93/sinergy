<?php

namespace App\Http\Controllers;

use App\Models\AreaAtuacao;
use Illuminate\Http\Request;

class AreasDeAtuacaoController extends Controller
{
    public function index()
    {

        $areas = AreaAtuacao::all();
        
        return view('areas.index', compact('areas'));
        
    }

    public function area($slug)
    {

        $areas = AreaAtuacao::all();

        $area = AreaAtuacao::where('slug', $slug)->first();
        
        return view('areas.area', compact('areas', 'area'));
        
    }
}
