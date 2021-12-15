@extends('layouts.app')

@section('title', 'Sinergy')

@section('content')

    <!-- Home -->
    <div id="home">

        <div class="main-slider">
            <div class="swiper swiperSlideHome">
                <div class="swiper-wrapper">

                    @foreach ($banners as $banner)
                    <div class="swiper-slide">
                        <div class="slide d-flex align-items-center" style="background-image: url({{ asset('assets/images/banners/banner-1.jpg') }});">
                            <div class="container d-flex justify-content-center justify-content-md-start">
                                <div class="content text-start">

                                    <div class="title text-uppercase">{{ $banner->title }}</div>

                                    @if ($banner->description)
                                    <div class="description mb-4">{{ $banner->description }}</div>
                                    @endif

                                    @if ($banner->link)
                                    <a href="{{ $banner->link }}" class="btn btn-primary rounded-0 text-white more">
                                        <span>Saiba mais</span></i>
                                    </a>
                                    @endif
                             
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

        <!-- SOBRE NÓS -->
        <section class="sobre-nos">

            <div class="container">

                <div class="heading text-center mb-4">
                    CONHEÇA A <span class="text-secondary">SINERGY</span>
                </div>

                <p class="mx-auto w-75 text-center">
                    A <strong>SINERGY SOLUÇÕES</strong> nasceu no ano de 2020 com o desafio de integrar de uma maneira transparente, ágil e simplificada pessoas, processos e oportunidades de negócio. Através de nossos serviços buscamos a interação entre sucateiros, indústrias de transformação e consumidores finais, visando sempre a otimização de processos, custos reduzidos, logística segura e acessível e claro, a total satisfação de cada cliente seja em qualquer parte do processo.
                </p>

                <div class="valores row my-5">

                    <div class="col-md-4">
                        <div class="card border-0">
                            <img src="{{ asset('assets/images/missao.jpg') }}" class="w-100 mb-3" alt="Missão">
                            <div class="card-body p-0">
                                <p class="card-title text-primary text-uppercase fs-5">Missão</p>
                                <p class="card-text">Na primeira ponta atender a uma necessidade mundial através da reciclagem de materiais ferrosos e não ferrosos e então devolver as pessoas produtos de alta qualidade atendendo as suas expectativas quanto a rendimento, valores e processos sustentáveis.</p>
                            </div>
                          </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0">
                            <img src="{{ asset('assets/images/visao.jpg') }}" class="card-img-top" alt="Missão">
                            <div class="card-body">
                                <p class="card-title text-primary text-uppercase fs-5">Visão</p>
                              <p class="card-text">Ser referência ao longo de todo processo de transformação, desde a compra até a venda de produtos transformados, caminhando lado a lado as normas ambientais e também promovendo melhorias para nossos colaboradores e todas as pessoas ao nosso redor. </p>
                            </div>
                          </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-0">
                            <img src="{{ asset('assets/images/valores.jpg') }}" class="card-img-top" alt="Missão">
                            <div class="card-body">
                                <p class="card-title text-primary text-uppercase fs-5">Valores</p>
                              <p class="card-text">Respeito ao meio ambiente / Comprometimento com o cliente / Transparência / Aprimoramento de processos / Valorização de nossos colaboradores.</p>
                            </div>
                          </div>
                    </div>
                    

                </div>


            </div>

        </section>

        <!-- ÁREAS DE ATUAÇÃO -->
        <section class="area-de-atuacao py-5 mb-md-5">

            <div class="container">

                <div class="heading text-center mb-4 text-white">
                    ÁREAS DE <span>ATUAÇÃO</span>
                </div>

                <p class="mx-auto w-75 text-center text-white mb-4">
                    A Sinergy busca em todo território nacional materiais de alta qualidade para composição de suas ligas, vergalhões e tarugos. Além disso atua como facilitadora e intermediadora na compra e venda de qualquer material ferroso e não ferroso. Oferecendo sempre as melhores condições, sejam elas preço, logística, atendimento e condições de pagamento. Atendemos todos os tipos de comercio de sucata, independente da quantidade, pois acreditamos que há sim espaço para que todos possam realizar ótimas negociações.
                </p>

                <div class="areas row justify-content-center">

                    @foreach ($areas as $area)
                    <a href="{{ route('areas.area', ['slug' => $area->slug]) }}" class="col-12 col-md-4 position-relative mb-4"> 
                        <div class="position-relative">
                            <img class="w-100" src="{{ asset('storage/'. $area->imagem) }}" alt="">
                            <div class="overlay"></div>
                            <h4 class="text-white text-center">{{ $area->titulo }}</h4>
                        </div>
                    </a>
                    @endforeach

                </div>

            </div>

        </section>

        <!-- GALERIA -->
        <section class="galeria py-5">

            <div class="container">

                <div class="heading text-center mb-4">
                    GALERIA DE <span class="text-secondary">IMAGENS</span>
                </div>

                <p class="mx-auto w-75 text-center">
                    Nullam facilisis mauris dolor, eget mattis tortor imperdiet posuere. Curabitur venenatis magna non odio convallis, in faucibus mi blandit. Pellentesque eget ante nec odio porttitor imperdiet eget id augue.
                </p>

                <div class="imagens mt-5">
                    
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

                                @foreach ($imagens->take(10) as $imagem)

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

                    <div class="text-center">
                        <a href="./galeria.html" class="btn btn-primary rounded-0 text-white px-4">
                            <span>Ver Todas</span></i>
                        </a>
                    </div>

                </div>

            </div>

        </section>

        <!-- VIDEOS -->
        <section class="videos my-5">

            <div class="d-lg-flex justify-content-center">

                <div class="column-1">

                    <div class="bg-video d-flex justify-content-center align-items-center">

                        <a data-fancybox href="https://www.youtube.com/watch?v=0G383538qzQ" class="play-video">
                            <i class="fas fa-play"></i>
                        </a>
                        
                    </div>

                </div>
                <div class="column-2">

                    <div class="bg-info p-4">

                        <div class="content">

                            <div class="heading text-start text-white mb-4">
                                ASSISTA NOSSOS <span>VÍDEOS</span>
                            </div>

                            <p class="text-start text-white">
                                Nullam facilisis mauris dolor, eget mattis tortor imperdiet posuere. Curabitur venenatis magna non odio convallis, in faucibus mi blandit. Pellentesque eget ante nec odio porttitor imperdiet eget id augue.
                            </p>

                            <div class="last-videos mt-4">

                                @foreach ($videos as $video)
                                <a data-fancybox href="https://www.youtube.com/watch?v={{ $video->codigo }}" class="d-flex justify-content-xl-between align-items-center mb-3">

                                    <img src="https://img.youtube.com/vi/{{ $video->codigo }}/maxresdefault.jpg" width="150" alt="">

                                    <div class="info-video ms-3">
                                        <h5 class="text-uppercase text-white">{{ $video->titulo }}</h5>
                                        <p class="text-white">{{ $video->descricao }}</p>
                                    </div>

                                </a>
                                @endforeach
                                
                                <div class="text-end">
                                    <a href="{{ route('videos.index') }}" class="text-white">Ver todos <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                                
                            </div>

                        </div>


                        
                    </div>


                </div>

            </div>
        </section>

        <!-- PARCEIROS -->
        <section class="parceiros pt-5">

            <div class="container">

                <div class="heading text-center mb-4">
                    NOSSOS <span class="text-secondary">PARCEIROS</span>
                </div>

                <div class="carousel-parceiros">

                    <div class="swiper swiperCarouselHome">
                        <div class="swiper-wrapper mb-5">
                            @foreach ($parceiros as $parceiro)
                            <div class="swiper-slide text-center"><img class="w-100" src="{{ asset('storage/'. $parceiro->imagem) }}" alt=""></div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                      </div>

                </div>

            </div>
        </section>

    </div>
    <!-- End Home -->

@endsection
