<header class="header">
    <nav class="navbar navbar-expand-lg p-0" id="myHeader">
        <a class="navbar-brand" href="index.html">
            <img src="{{asset('assets/templates/tmp2/new_front/img/logo.png')}}" class="img-fluid d-none d-sm-block" width="400" alt="">
            <img src="{{asset('assets/templates/tmp2/new_front/img/logo-movil.png')}}" class="img-fluid d-none logo-movil" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars navbar-toggler-icon"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav text-right">
                <form method="" action="">
                    <div class="form-group collapse mr-2 mb-0" id="collapseSearch">
                        <input type="text" class="form-control" id="">
                    </div>
                </form>
                <li class="nav-item">
                    <a class="nav-link hover" data-toggle="collapse" href="#collapseSearch" role="button"
                        aria-expanded="false" aria-controls="collapseSearch"><i class="fas fa-search"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover" href="#"><i class="fas fa-globe  mr-2 ml-2"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover" href="{{url('user/login')}}"><i class="fas fa-user mr-1"></i> Iniciar sesión</a>
                    {{-- <a class="nav-link hover" href="login.html"><i class="fas fa-user mr-1"></i> Iniciar sesión</a> --}}
                </li>
            </ul>
            <ul class="nav btn-download justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('user/register')}}">Signup</a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="nav menu justify-content-center top-container">
        <a class="nav-link active" href="index.html">Inicio</a>
        <a class="nav-link" href="#">Servicios</a>
        <a class="nav-link" href="#">¿Quienes somos?</a>
        <a class="nav-link" href="blog.html">Blog</a>
        <a class="nav-link" href="contacto.html">Contacto</a>
    </nav>
</header>
