@extends('layouts.app')

@section('title', 'Conquest Broker - Sobre Nós')

@section('content')

<div id="galeria">

    <div class="banner-page d-flex justify-content-center align-items-center mb-5"  style="background-image: url({{ asset('assets/images/banners/banner-1.jpg') }} );">
        <div class="container">
            <div class="content d-flex justify-content-center">
                <h1 class="text-uppercase text-white">Galeria</h1>
            </div>
        </div>
    </div>
    

    <div class="container">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

            @foreach ($galerias as $galeria)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $galeria->slug }}-tab" data-bs-toggle="pill" data-bs-target="#{{ $galeria->slug }}" type="button" role="tab" aria-controls="{{ $galeria->slug }}" aria-selected="true">{{ $galeria->titulo }}</button>
            </li>
            @endforeach

        </ul>
        <div class="tab-content" id="pills-tabContent">

            @foreach ($galerias as $galeria)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $galeria->slug }}" role="tabpanel" aria-labelledby="{{ $galeria->slug }}-tab">

                <div class="row">

                    @foreach ($imagens as $imagem)

                        @if ($imagem->galeria_id == $galeria->id)

                            <div class="col-12 col-md-3 mb-4">
                                <a href="{{ asset('storage/'. $imagem->imagem) }}" data-fancybox="{{ $galeria->slug }}">
                                    <img class="w-100" src="{{ asset('storage/'. $imagem->thumbnail) }}" alt="">
                                </a>
                            </div>

                        @endif

                    @endforeach

                </div>
                
            </div>
            @endforeach


        </div>

    </div>

</div>

@endsection
