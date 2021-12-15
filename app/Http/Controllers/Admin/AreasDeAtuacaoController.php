<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AreaAtuacao;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AreasDeAtuacaoController extends Controller
{


    private $area;

    public function __construct(AreaAtuacao $area)
    {
        $this->area = $area;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = $this->area->all();

        return view('admin.areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.areas.create');
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

        $slug = Str::slug($request->titulo, '-');
        $data['slug'] = $slug;

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem')->store('areas', 'public');
            $data['imagem'] = $imagem;

            // Redimensionando a imagem
            $image = Image::make(public_path("storage/{$imagem}"))->fit(370, 250);
            $image->save();
        }


        $area = $this->area->create($data);

        flash('Registro criado com sucesso!')->success();
        return redirect()->route('admin.areas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($area)
    {

        $area = $this->area->findOrFail($area);

        return view('admin.areas.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $area)
    {
        $data = $request->all();

        $area = $this->area->find($area);

        $slug = Str::slug($request->titulo, '-');
        $data['slug'] = $slug;

        if ($request->hasFile('imagem')) {

            if (Storage::disk('public')->exists($area->imagem)) {
                Storage::disk('public')->delete($area->imagem);
            }

            $imagem = $request->file('imagem')->store('areas', 'public');
            $data['imagem'] = $imagem;

            // Redimensionando a imagem
            $image = Image::make(public_path("storage/{$imagem}"))->fit(370, 250);
            $image->save();
        }

        $area->update($data);

        flash('Registro atualizado com sucesso!')->success();
        return redirect()->route('admin.areas.index');
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

        $area = $this->area->find($id);

        if ($area->delete() == TRUE) {

            if (Storage::disk('public')->exists($area->imagem)) {
                Storage::disk('public')->delete($area->imagem);
            }

            flash('Registro removido com sucesso!')->success();
            return redirect()->route('admin.areas.index');
        }
    }
}
