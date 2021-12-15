@extends('layouts.app')

@section('title', 'Conquest Broker - Sobre Nós')

@section('content')

<div id="areas-de-atuacao">

    <div class="banner-page d-flex justify-content-center align-items-center mb-5"  style="background-image: url({{ asset('assets/images/banners/banner-1.jpg') }} );">
        <div class="container">
            <div class="content d-flex justify-content-center">
                <h1 class="text-uppercase text-white">Áreas de Atuação</h1>
            </div>
        </div>
    </div>
    
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <nav class="nav flex-column mb-5">

                    @foreach ($areas as $area)
                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" aria-current="page" href="{{ route('areas.area', ['slug' => $area->slug]) }}">{{ $area->titulo  }}</a>
                    @endforeach
                    
                  </nav>
            </div>

            <div class="col-lg-9">

                <h3 class="text-secondary mb-4">Embalagens</h3>

                
            </div>
        </div>

    </div>

</div>


@endsection
