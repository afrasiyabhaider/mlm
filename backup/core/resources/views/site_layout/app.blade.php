<!DOCTYPE html>
<html lang="es">
    @include('site_layout.partials.head')
<body>
    @include('site_layout.partials.nav')
    {{-- Content Starts here --}}
    @yield('content')
    {{-- Content Ends here --}}
    @include('site_layout.partials.footer')
    @include('site_layout.partials.scripts')

</body>
</html>
