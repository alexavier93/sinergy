@extends('admin.layouts.app')

@section('title', '- Editar Galeria')

@section('content')

    <!-- Page Heading -->
    <div class="page-header-content py-3">

        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Galerias</h1>
        </div>

        <ol class="breadcrumb mb-0 mt-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.galerias.index') }}">Galerias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Galeria</li>
        </ol>

    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12 mb-4">
            @include('flash::message')
        </div>

        <!-- Content Column -->
        <div class="col-xl-12 col-md-12 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">

                <div class="card-header">
                    <span class="m-0 font-weight-bold text-primary">Informações</span>

                    <div class="float-right">
                        <button type="submit" form="form-galeria" class="btn btn-sm btn-primary">Salvar</button>
                    </div>
                </div>

                <div class="card-body">

                    @include('flash::message')
                    <div class="alert" role="alert" style="display: none;"></div>

                    <nav>
                        <div class="nav nav-pills" id="tabStep" role="tablist">
                            <a class="nav-link active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">Definições básicas</a>
                            <a class="nav-link" id="step2-tab" data-toggle="tab" href="#step2" role="tab" aria-controls="step2" aria-selected="false">Galeria</a>
                        
                        </div>
                    </nav>

                    <form id="form-galeria" action="{{ route('admin.galerias.update', ['galeria' => $galeria->id]) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method("PUT")

                        <input type="hidden" id="galeria_id" value="{{ $galeria->id }}">

                        <div class="tab-content mt-2" id="nav-tabContent">

                            <!-- Definições Básica -->
                            <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">

                                <div class="card p-3">

                                    <div class="form-group row">
                                        <div class="col-md-2">Status</div>
                                        <div class="col-md-10">
                                            <label class="switch">
                                                <input type="checkbox" name="status" value="1" {{ ($galeria->status == 1 ? 'checked' : '') }}>
                                                <span class="slider success"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="titulo" class="form-control" value="{{ $galeria->titulo }}">
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <!-- Galeria -->
                            <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">

                                <div class="card p-3">

                                    <div class="row">

                                        <div class="col-lg-12 mb-3">

                                            <input type="hidden" id="getGaleria" value="{{ route('admin.galerias.getGaleria') }}">
                                            <input type="hidden" id="urlUploadGaleria" value="{{ route('admin.galerias.uploadGaleria') }}">

                                            <div class="images form-inline">
                                                <div class="form-group">
                                                    <input type="file" name="images[]" id="images" class="form-control"  placeholder="Selecione as imagens" multiple>
                                                </div>
                                                <button type="button" id="uploadGaleria" class="btn btn-primary ml-3">Fazer Upload</button>
                                            </div>

                                        </div>

                                        <div class="col-lg-12">
                                            <div id="galeria" class="row"></div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        
                    </form>
                    
                </div>

            </div>

        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="py-3 m-0">Tem certeza que deseja excluir este registro?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger btn-sm delete">Excluir</button>
                </div>
            </div>
        </div>
    </div>


@endsection
