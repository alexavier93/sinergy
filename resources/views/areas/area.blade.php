@extends('layouts.app')

@section('title', 'Sinergy - ' $area->titulo )

@section('content')

<div id="areas-de-atuacao">

    <div class="banner-page d-flex justify-content-center align-items-center mb-5"  style="background-image: url({{ asset('assets/images/banners/banner-1.jpg') }} );">
        <div class="container">
            <div class="content d-flex justify-content-center">
                <h1 class="text-uppercase text-white">Áreas de Atuação - {{ $area->titulo }}</h1>
            </div>
        </div>
    </div>
    
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <nav class="nav flex-column mb-5">

                    @foreach ($areas as $item)
                        <a class="nav-link {{ ($item->id == $area->id ? 'active' : '') }}" aria-current="page" href="{{ route('areas.area', ['slug' => $item->slug]) }}">{{ $item->titulo  }}</a>
                    @endforeach
                    
                  </nav>
            </div>

            <div class="col-lg-9">

                <h3 class="text-secondary mb-4">{{ $area->titulo }}</h3>

                <div>
                    {!! $area->texto !!}
                </div>

                
            </div>
        </div>

    </div>

</div>


@endsection
