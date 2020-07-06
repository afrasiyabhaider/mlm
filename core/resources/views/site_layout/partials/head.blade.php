<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title') |
        {{config('app.name','Inicio - Galaxy Games')}}
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/templates/tmp2/new_front/css/bootstrap.min.css')}}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/templates/tmp2/new_front/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/templates/tmp2/new_front/css/solid.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/templates/tmp2/new_front/css/brands.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/templates/tmp2/new_front/css/styles.css')}}">

    @yield('css')

</head>
