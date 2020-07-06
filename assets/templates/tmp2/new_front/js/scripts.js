//Boton para volver arriba
$(document).ready(function(){
  $(window).scroll(function () {
          if ($(this).scrollTop() > 50) {
              $('#back-to-top').fadeIn();
          } else {
              $('#back-to-top').fadeOut();
          }
      });
      // Hace scroll hasta la top 0 en el body
      $('#back-to-top').click(function () {
          $('body,html').animate({
              scrollTop: 0
          }, 400);
          return false;
      });
});

//Mostrar y ocultar contraseña
window.onscroll = function() {myFunction()};
var header = document.getElementById("myHeader");
var sticky = header.offsetTop;
    
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

//validar campos vacios
(function() {
  'use strict';
  window.addEventListener('load', function() {
  var forms = document.getElementsByClassName('needs-validation');
  var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
      }
      form.classList.add('was-validated');
      }, false);
  });
  }, false);
})();