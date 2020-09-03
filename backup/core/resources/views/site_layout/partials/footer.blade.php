<footer id="sticky-footer" class="footer-section">
    <!--footer top start-->
    <div class="footer-top text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-nav-wrap text-white">
                        <h4 class="text-white">soporte</h4>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li><li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li><li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </div>
                <div class="col-lg-4">
                    <div class="footer-nav-wrap text-white">
                        <h4 class="text-white">soporte</h4>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li><li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li><li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                </div>
                <div class="col-lg-4">
                    <div class="footer-nav-wrap text-white">
                        <h4 class="text-white">soporte</h4>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li><li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li><li class="nav-item">
                                <a class="nav-link" href="#">Lorem input</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer top end-->
    <!--footer bottom start-->
    <div class="footer-bottom gray-light-bg py-3">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-12 col-lg-12">
                   <img src="img/logo-footer.png" class="img-fluid mt-3 mb-4" alt="">
                </div>
                <div class="col-md-12">
                    <ul class="nav justify-content-center">
                        <li class="nav-item"><a class="nav-link" href="#">empleos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">información</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">asistencia</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">prensa</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">api</a></li>
                    </ul>
                    <ul class="nav justify-content-center">
                        <li class="nav-item"><a class="nav-link"href="#">privacidad</a></li>
                        <li class="nav-item"><a class="nav-link"href="#">legal</a></li>
                        <li class="nav-item"><a class="nav-link"href="#">términos</a></li>
                        <li class="nav-item"><a class="nav-link"href="#">cookies</a></li>
                    </ul>
                    <hr>
                    <div class="nav justify-content-center social">
                        @foreach($social as $item)
                            <a class="nav-link fa-3x" href="{{$item->value->url}}"
                                title="{{$item->value->title}}">@php echo $item->value->icon; @endphp</a>
                        @endforeach
                        {{-- <a class="nav-link" href="#" title="Facebook"><span class="fab fa-facebook-square fa-4x"></span></a>
                        <a class="nav-link" href="#" title="Twitter"><span class="fab fa-twitter-square fa-4x"></span></a>
                        <a class="nav-link" href="#" title="Youtube"><span class="fab fa-youtube-square fa-4x"></span></a>
                        <a class="nav-link" href="#" title="Instagram"><span class="fab fa-instagram-square fa-4x"></span></a> --}}
                    </div>
                    <p class="mt-4">
                        {{__($footer->title)}}
                    </p>
                    {{-- <p class="mt-4">Copyright © 2020 Galaxy Games. Todos los derechos reservados. Página web diseñada por <a href="https://www.qode.pro" >Qode</a>.</p> --}}
                </div>
            </div>
        </div>
    </div>
    <!--footer bottom end-->
</footer>
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
