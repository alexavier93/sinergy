@extends('layouts.app')

@section('title', 'Conquest Broker - Sobre Nós')

@section('content')

    <div id="parceiros">

        <div class="banner-page d-flex justify-content-center align-items-center mb-5"  style="background-image: url({{ asset('assets/images/banners/banner-1.jpg') }} );">
            <div class="container">
                <div class="content d-flex justify-content-center">
                    <h1 class="text-uppercase text-white">Parceiros</h1>
                </div>
            </div>
        </div>


        <div class="container">

            <div class="row">

                @foreach ($parceiros as $parceiro)

                <div class="col-lg-3 text-center mb-4">
                    <img class="w-100" src="{{ asset('storage/'. $parceiro->imagem) }}" alt="{{ $parceiro->nome }}" titulo="{{ $parceiro->nome }}">
                </div>

                @endforeach

            </div>

        </div>

    </div>

@endsection
