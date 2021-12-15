<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    
    
    private $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = $this->video->all();

        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
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

        $url = $request->codigo;
        $id_video = get_youtubeid($url);
        $data['codigo'] = $id_video;

        $this->video->create($data);

        flash('Registro criado com sucesso!')->success();
        return redirect()->route('admin.videos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($video)
    {
        $video = $this->video->findOrFail($video);
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $video)
    {
        $data = $request->all();
        
        $video = $this->video->find($video);

        $url = $request->codigo;
        $id_video = get_youtubeid($url);

        
        $data['codigo'] = $id_video;

        $video->update($data);

        flash('Registro atualizado com sucesso!')->success();
        return redirect()->route('admin.videos.index');
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

        $video = $this->video->find($id);

        if ($video->delete() == TRUE) {

            flash('Registro removido com sucesso!')->success();
            return redirect()->route('admin.videos.index');
        }
    }

}
