<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parceiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ParceirosController extends Controller
{

    private $parceiro;

    public function __construct(Parceiro $parceiro)
    {
        $this->parceiro = $parceiro;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parceiros = $this->parceiro->all();

        return view('admin.parceiros.index', compact('parceiros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.parceiros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $imagem = $request->file('imagem')->store('uploads', 'public');
        $data['imagem'] = $imagem;

        // Redimensionando a imagem
        $imagem = Image::make(public_path("storage/{$imagem}"))->fit(300, 250);
        $imagem->save();

        $this->parceiro->create($data);

        flash('Registro criado com sucesso!')->success();
        return redirect()->route('admin.parceiros.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($parceiro)
    {
        $parceiro = $this->parceiro->findOrFail($parceiro);
        return view('admin.parceiros.edit', compact('parceiro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $parceiro)
    {
        $data = $request->all();
        
        $parceiro = $this->parceiro->find($parceiro);

        if ($request->hasFile('imagem')) {

            if (Storage::exists($parceiro->imagem)) {
                Storage::delete($parceiro->imagem);
            }

            $imagem = $request->file('imagem')->store('parceiros', 'public');
            $data['imagem'] = $imagem;

            // Redimensionando a imagem
            $imagem = Image::make(public_path("storage/{$imagem}"))->fit(300, 250);
            $imagem->save();
        }

        $parceiro->update($data);

        flash('Registro atualizado com sucesso!')->success();
        return redirect()->route('admin.parceiros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;

        $parceiro = $this->parceiro->find($id);

        if ($parceiro->delete() == TRUE) {

            if (Storage::disk('public')->exists($parceiro->imagem)) {
                Storage::disk('public')->delete($parceiro->imagem);
            }

            flash('Registro removido com sucesso!')->success();
            return redirect()->route('admin.parceiros.index');
        }
    }

}
