@extends('admin.layouts.app')

@section('title', '- Nova Galeria')

@section('content')

    <!-- Page Heading -->
    <div class="page-header-content py-3">

        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Galerias</h1>
        </div>

        <ol class="breadcrumb mb-0 mt-4">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.galerias.index') }}">Galerias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nova Galeria</li>
        </ol>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-xl-12 col-lg-12 mb-4">

            @include('flash::message')

            <!-- Project Card Example -->
            <div class="card shadow mb-4">

                <div class="card-header">
                    <span class="m-0 font-weight-bold text-primary">Informações do Galeria</span>

                    <div class="float-right">
                        <button type="submit" form="form-galeria" class="btn btn-sm btn-primary">Salvar</button>
                    </div>
                </div>

                <div class="card-body">

                    <nav>
                        <div class="nav nav-pills" id="tabStep" role="tablist">
                            <a class="nav-link active" id="step1-tab" data-toggle="tab" href="#step1" role="tab" aria-controls="step1" aria-selected="true">Definições básicas</a>
                        </div>
                    </nav>

                    <form id="form-galeria" action="{{ route('admin.galerias.store') }}" method="post">

                        @csrf
                        <div class="tab-content mt-2" id="nav-tabContent">

                            <!-- Definições Básica -->
                            <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">

                                <div class="card p-3">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
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


@endsection
