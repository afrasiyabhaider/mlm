<!--Jquery 3.5.1-->
<script src="{{asset('assets/templates/tmp2/new_front/js/jquery-3.5.1.min.js')}}"></script>
<!--Bootstrap 4.5 Js-->
<script src="{{asset('assets/templates/tmp2/new_front/js/bootstrap.min.js')}}"></script>
<!--Custom Js-->
<script src="{{asset('assets/templates/tmp2/new_front/js/scripts.js')}}"></script>
<script src="{{asset('assets/templates/tmp2/new_front/js/jquery.featureCarousel.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
      var carousel = $("#carousel").featureCarousel({});
    });
</script>
@yield('script')
