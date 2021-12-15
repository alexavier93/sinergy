<?php

namespace App\Http\Controllers;

use App\Models\Parceiro;
use Illuminate\Http\Request;

class ParceirosController extends Controller
{

    public function index()
    {

        $parceiros = Parceiro::all();

        return view('parceiros.index', compact('parceiros'));
        
    }

}
