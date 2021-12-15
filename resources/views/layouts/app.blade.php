<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('/assets/images/favicon.ico') }} ">

    <title>Sinergy</title>
    
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

</head>
<body>
    
    <header>
        <div class="header-top py-1 border-bottom">

            <div class="container">

                <div class="d-sm-flex justify-content-between align-items-center">

                    <div class="col-12 col-sm-6">
                        <ul class="contact d-flex justify-content-start flex-column flex-sm-row list-unstyled mb-0 text-center text-sm-start">
                            <li class="me-3"><i class="fab fa-whatsapp text-secondary"></i> 11 99999-8888</li>
                            <li><i class="far fa-envelope text-secondary"></i> contato@seudominio.com.br</li>
                        </ul>
                    </div>

                    <div class="col-12 col-sm-6">
                        <ul class="social-midia justify-content-center justify-sm-content-start list-unstyled d-flex mb-0 mt-2 mt-sm-0">
                            <li class="me-2"><a href=""><i class="fab fa-facebook-square fs-4 text-primary"></i></a></li>
                            <li class="me-2"><a href=""><i class="fab fa-instagram-square fs-4 text-primary"></i></a></li>
                            <li class="me-2"><a href=""><i class="fab fa-youtube-square fs-4 text-primary"></i></a></li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>
        <div class="header-nav">

            <div class="container">
                <div class="wrap">

                    <div class="logo">
                        <a href="{{ route('home') }}" class="logo-main"><img class="img-fluid" src="{{ asset('assets/images/logo-sinergy.png') }}" alt=""></a>
                        <a href="{{ route('home') }}" class="logo-fix"><img class="img-fluid" src="{{ asset('assets/images/logo-sinergy.png') }}" alt=""></a>
                    </div>
    
                    <div class="menu">
    
                        <nav class="nav">
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('areas.*') ? 'active' : '' }}" href="{{ route('areas.index') }}">Áreas de Atuação</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('galeria.*') ? 'active' : '' }}" href="{{ route('galeria.index') }}">Galeria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('parceiros.*') ? 'active' : '' }}" href="{{ route('parceiros.index') }}">Parceiros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contato">Contato</a>
                                </li>
                            </ul>
                        </nav> 
    
                    </div>
    
                    <div class="icon-sidemenu d-xl-none d-flex flex-grow-1
                        justify-content-end align-items-center">
                        <a href="javascript:void(0)" class="sidemenu_btn"
                            id="sidemenu_toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
    
                </div>

            </div>

            <!--Side Nav-->
            <div class="side-menu hidden">
                <div class="inner-wrapper">
                    <span class="btn-close" id="btn_sideNavClose"><i></i></span>
                    <nav class="side-nav w-100">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('areas.*') ? 'active' : '' }}" href="{{ route('areas.index') }}">Áreas de Atuação</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('galeria.*') ? 'active' : '' }}" href="{{ route('galeria.index') }}">Galeria</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('parceiros.*') ? 'active' : '' }}" href="{{ route('parceiros.index') }}">Parceiros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contato">Contato</a>
                            </li>
                        </ul>
                    </nav>

                </div>

            </div>

            <a id="close_side_menu" href="javascript:void(0);"></a>

        </div>

    </header>

    <main role="main">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-top pt-5 pb-2 mt-5">

        <div class="container">

            <div class="row">

                <div class="col-md-7">

                    <img class="mb-4" src="{{ asset('assets/images/logo-sinergy-footer.png') }}" alt="">

                    <div class="description mb-4">
                        <p class="text-white">A Sinergy busca em todo território nacional materiais de alta qualidade para composição de suas ligas, vergalhões e tarugos. Além disso atua como facilitadora e intermediadora na compra e venda de qualquer material ferroso e não ferroso. Oferecendo sempre as melhores condições, sejam elas preço, logística, atendimento e condições de pagamento. Atendemos todos os tipos de comercio de sucata, independente da quantidade, pois acreditamos que há sim espaço para que todos possam realizar ótimas negociações.</p>
                    </div>

                    <ul class="contact nav list-unstyled d-flex flex-column mb-2">
                        <li class="me-4 text-white"><i class="fab fa-whatsapp text-primary fs-5"></i> 11 99999-8888</li>
                        <li class="me-2 text-white"><i class="far fa-envelope text-primary fs-6"></i> contato@seudominio.com.br</li>
                        <li class="me-2 text-white"><i class="fas fa-map-marker-alt text-primary fs-6"></i> 11 8888-9999</li>
                    </ul>

                    <ul class="social-midia nav justify-content-start list-unstyled d-flex mb-2">
                        <li class="me-2"><a href=""><i class="fab fa-facebook-square fs-4 text-primary"></i></a></li>
                        <li class="me-2"><a href=""><i class="fab fa-instagram-square fs-4 text-primary"></i></a></li>
                        <li class="me-2"><a href=""><i class="fab fa-youtube-square fs-4 text-primary"></i></a></li>
                    </ul>

                </div>

                <div class="col-md-5">

                    <div class="heading mb-2 text-white fs-2">
                        ENTRE EM <span>CONTATO</span>
                    </div>

                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing.</p>

                    <div id="contato" class="form-footer mb-4">

                        <div class="alert" role="alert" style="display: none;"></div>

                        <form class="row g-3">

                            <input type="hidden" name="url" value="{{ route('contato.sendMail') }}">
                        
                            <div class="col-12 col-md-6">
                                <input type="text" name="name" class="form-control rounded-0 p-2" placeholder="Nome">
                            </div>

                            <div class="col-12 col-md-6">
                                <input type="text" name="phone" class="form-control rounded-0 p-2" placeholder="Telefone">
                            </div>

                            <div class="col-12 col-md-12">
                                <input type="email" name="email" class="form-control rounded-0 p-2" placeholder="E-mail">
                            </div>

                            <div class="col-12 col-md-12">
                                <textarea name="description" class="form-control rounded-0 p-2" rows="5" placeholder="Mensagem"></textarea>
                            </div>

                            <div class="col-12 col-md-12">
                                <button type="submit" class="btn btn-outline-primary rounded-0 py-2 px-3 text-uppercase">Enviar</button>
                            </div>

                        </form>

                    </div>


                </div>

            </div>

            <hr class="text-primary">

            <div class="d-md-flex justify-content-md-between">
                <p class="text-muted">© {{ now()->year }} Sinergy. Todos os direitos reservados.</p>
                <p class="text-muted">Desenvolvido por: <a href="">Agência Affinity</a></p>
            </div>


        </div>

    </footer>
    <!-- End Footer -->

    <script src="{{ asset('/assets/js/app.js') }} "></script>

</body>
</html>
