@extends('layouts.app')

@section('title', 'Sinergy - Vídeos')

@section('content')

    <div id="parceiros">

        <div class="banner-page d-flex justify-content-center align-items-center mb-5"  style="background-image: url({{ asset('assets/images/banners/banner-1.jpg') }} );">
            <div class="container">
                <div class="content d-flex justify-content-center">
                    <h1 class="text-uppercase text-white">Vídeos</h1>
                </div>
            </div>
        </div>


        <div class="container">

            <div class="row">

                @foreach ($videos as $video)

                <div class="col-lg-3 text-center mb-4">
                    <a data-fancybox href="https://www.youtube.com/watch?v={{ $video->codigo }}">
                        <img class="w-100" src="https://img.youtube.com/vi/{{ $video->codigo }}/maxresdefault.jpg" alt="{{ $video->titulo }}" title="{{ $video->titulo }}">
                    </a>
                    <h5 class="mt-2">{{ $video->titulo }}</h5>
                    <p>{{ $video->descricao }}</p>
                </div>

                @endforeach

            </div>

        </div>

    </div>

@endsection
