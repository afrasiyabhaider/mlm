@extends('site_layout.app')
@section('title')
Home
@endsection
@section('content')
<main class="content">
    <section class="headboard">
        <img src="{{asset('assets/templates/tmp2/new_front/img/header-img.png')}}" alt="hello">
    </section>
    <section class="mini-info">
        <div class="row m-0">
            <div class="media col-lg-4">
                <i class="fas fa-circle fa-4x"></i>
                <div class="media-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <span class="nav-link">Todos tus juegos en un mismo lugar:</span>
                        </li>
                        <li>
                            <a href="#" class="nav-link">Aplicación de escritorio GalaxyGames.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="media col-lg-4">
                <i class="fas fa-circle fa-4x borde"></i>
                <div class="media-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <span class="nav-link">Mantén la conexión dondequiera que vayas:</span>
                        </li>
                        <li>
                            <a href="#" class="nav-link">Aplicación móvil GalaxyGames.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="media col-lg-4">
                <i class="fas fa-circle fa-4x borde"></i>
                <div class="media-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <span class="nav-link">Mantén la conexión dondequiera que vayas:</span>
                        </li>
                        <li>
                            <a href="#" class="nav-link">Aplicación móvil GalaxyGames.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="slider-content d-none d-md-block">
        <div class="container">
            <div class="col-md-12 title-section">
                <h3 class="d-inline-block">Juegos</h3>
                <a href="#" class="category-g d-inline-block"> <span class="arrow-t">>></span> Ver todos los juegos</a>
            </div>
            <div class="row justify-content-center">
                <div class="carousel-container">
                    <div id="carousel">
                        <div class="carousel-feature">
                            <div class="marco">
                                <a href="#"><img class="carousel-image img-fluid" alt="" src="{{asset('assets/templates/tmp2/new_front/img/slider.png')}}"></a>
                            </div>
                        </div>
                        <div class="carousel-feature">
                            <div class="marco">
                                <a href="#"><img class="carousel-image img-fluid" alt="" src="{{asset('assets/templates/tmp2/new_front/img/slider.png')}}"></a>
                            </div>
                        </div>
                        <div class="carousel-feature">
                            <div class="marco">
                                <a href="#"><img class="carousel-image img-fluid" alt="" src="{{asset('assets/templates/tmp2/new_front/img/slider.png')}}"></a>
                            </div>
                        </div>
                        <div class="carousel-feature">
                            <div class="marco">
                                <a href="#"><img class="carousel-image img-fluid" alt="" src="{{asset('assets/templates/tmp2/new_front/img/slider.png')}}"></a>
                            </div>
                        </div>
                    </div>
                    <div id="carousel-left"> <img class="r-left" src="img/arrow-left.png" alt="flecha izquierda"></div>
                    <div id="carousel-right"> <img class="r-right" src="img/arrow-right.png" alt="flecha derecha"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="post pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 title-section">
                    <h3 class="d-inline-block">Novedades</h3>
                    <a href="#" class="category-g d-inline-block"><span class="arrow-t">>></span> Ver todas las
                        noticias</a>
                </div>
                <div class="card col-md-4">
                    <img src="{{asset('assets/templates/tmp2/new_front/img/img-blog.png')}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="category "><span class="arrow-t">>></span> Categoria</p>
                        <h5 class="card-title">Titulo de la entrada</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum porro
                            debitis reiciendis, voluptates corrupti laudantium quidem dolor quasi cupiditate eveniet
                            aspernatur dolorem molestias a animi dolore beatae omnis fuga nulla. </p>
                        <a href="#" class="btn">Ver más >></a>
                    </div>
                </div>
                <div class="card col-md-4">
                    <img src="{{asset('assets/templates/tmp2/new_front/img/img-blog.png')}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="category "><span class="arrow-t">>></span> Categoria</p>
                        <h5 class="card-title">Titulo de la entrada</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum porro
                            debitis reiciendis, voluptates corrupti laudantium quidem dolor quasi cupiditate eveniet
                            aspernatur dolorem molestias a animi dolore beatae omnis fuga nulla. </p>
                        <a href="#" class="btn">Ver más >></a>
                    </div>
                </div>
                <div class="card col-md-4">
                    <img src="{{asset('assets/templates/tmp2/new_front/img/img-blog.png')}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <p class="category "><span class="arrow-t">>></span> Categoria</p>
                        <h5 class="card-title">Titulo de la entrada</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum porro
                            debitis reiciendis, voluptates corrupti laudantium quidem dolor quasi cupiditate eveniet
                            aspernatur dolorem molestias a animi dolore beatae omnis fuga nulla. </p>
                        <a href="#" class="btn">Ver más >></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
