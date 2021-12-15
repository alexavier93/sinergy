<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\GaleriaImagem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GaleriaController extends Controller
{

    private $galeria;

    public function __construct(Galeria $galeria)
    {
        $this->galeria = $galeria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerias = $this->galeria->all();

        return view('admin.galerias.index', compact('galerias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galerias.create');
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

        $galeria = $this->galeria->create($data);

        flash('Registro criado com sucesso!')->success();
        return redirect()->route('admin.galerias.edit', ['galeria' => $galeria->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($galeria)
    {
        $galeria = $this->galeria->findOrFail($galeria);
        return view('admin.galerias.edit', compact('galeria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $galeria)
    {
        $data = $request->all();
        
        $galeria = $this->galeria->find($galeria);

        $slug = Str::slug($request->titulo, '-');
        $data['slug'] = $slug;

        $galeria->update($data);

        flash('Registro atualizado com sucesso!')->success();
        return redirect()->route('admin.galerias.index');
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

        $galeria = $this->galeria->find($id);

        if ($galeria->delete() == TRUE) {


            $images = GaleriaImagem::where('galeria_id', $id)->get();

            foreach($images as $image){

                $image->delete();

                if (Storage::disk('public')->exists($image->image)) {
                    Storage::disk('public')->delete($image->image);
                    Storage::disk('public')->delete($image->thumbnail);
                }

            }

            flash('Registro removido com sucesso!')->success();
            return redirect()->route('admin.galerias.index');
        }
    }


    /*
    * GALERIA
    */

    public function getGaleria()
    {

        $galeria_id = $_POST["galeria_id"];

        $images = GaleriaImagem::where('galeria_id', $galeria_id)->get();

        $html = '';

        foreach ($images as $image) {

            $html .= '

                <div class="col-md-4 col-lg-2 mb-3">
        
                    <div class="card">
                        <div class="img"><img src="' . asset('storage/' . $image->thumbnail) . '" class="card-img-top"></div>
                        <div class="p-2 text-center">
                            <button type="button" class="btn btn-sm btn-default delete_image" data-toggle="modal" data-target="#modalDelete" data-id="' . $image->id . '" data-url="' . route('admin.galerias.deleteImagem') . '" ><i class="far fa-trash-alt"></i> Eliminar</button>
                        </div>
                    </div>
                
                </div>
            ';
        }

        echo json_encode($html);
    }

    public function uploadGaleria(Request $request)
    {
        $galeria_id = $request->galeria_id;

        if ($request->TotalFiles > 0) {

            for ($x = 0; $x < $request->TotalFiles; $x++) {

                if ($request->hasFile('images' . $x)) {

                    $image = $request->file('images' . $x);

                    $hash = str_replace('.', '', str_replace('/', '', Hash::make('&U%v3#tBcpeA%0Rs')));

                    $input['thumbnail'] = $hash . '_thumbnail.' . $image->extension();
                    $input['image'] = $hash . '.' . $image->extension();

                    $dir = 'galerias/'. $galeria_id;

                    if (!Storage::disk('public')->exists($dir)) {
                        Storage::disk('public')->makeDirectory($dir, 0755, true, true);
                    }

                    $filePath = public_path('storage/' . $dir);

                    $img = Image::make($image->path());

                    $img->fit(750, 500, function ($const) {
                        $const->aspectRatio();
                    })->save($filePath . '/' . $input['thumbnail']);

                    $image->move($filePath, $input['image']);

                    $data[$x]['galeria_id'] = $galeria_id;
                    $data[$x]['imagem'] = $dir .'/'. $input['image'];
                    $data[$x]['thumbnail'] = $dir .'/'. $input['thumbnail'];
                }
            }

            //inserir no banco
            GaleriaImagem::insert($data);

            $response = array('success' => 'Upload de imagens feito com sucesso');
        } else {

            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }

    public function deleteImagem(Request $request)
    {

        $id = $request->id;

        $image = GaleriaImagem::find($id);

        if ($image->delete()) {

            if (Storage::disk('public')->exists($image->imagem)) {
                Storage::disk('public')->delete($image->imagem);
                Storage::disk('public')->delete($image->thumbnail);

                $response = array('success' => 'Imagem removida com sucesso!');
            }

        } else {

            $response = array('erro' => 'Ocorreu um erro, tente novamente.');
        }

        echo json_encode($response);
    }

}
