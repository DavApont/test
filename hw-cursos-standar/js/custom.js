// JavaScript Document
// Generado Por David Aponte.
// Todo los derechos reservados
// bajo Licencia GPL

  $(document).ready(function() {
  var menu = $('#menu-flotante');
  var contenedor = $('#contenedor');
  var cont_offset = contenedor.offset();
  // Cada vez que se haga scroll en la pagina
  // haremos un chequeo del estado del menÃº
  // y lo vamos a alternar entre 'fixed' y 'static'.

  $(window).on('scroll', function() {
  	 //alert($(window).scrollTop());
    if($(window).scrollTop() > cont_offset.top) {
      menu.addClass('menu-fijo');
      menu.removeClass('hide');
    } else {
      menu.removeClass('menu-fijo');
      menu.addClass('hide');
    }
  });
});

//facebook Like Shared.
(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=311251382387650&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
//scroll site

(function(a){
  var 
  b={upKey:38,downKey:40,easing:"linear",scrollTime:2000,activeClass:"active",onPageChange:null};a.scrollIt=function(d){var e=a.extend(b,d);var g=0;var i=a("[data-scroll-index]:last").attr("data-scroll-index");var c=function(j){if(j<0||j>i){return}var k=a("[data-scroll-index="+j+"]").offset().top;a("html,body").animate({scrollTop:k,easing:e.easing},e.scrollTime)};var f=function(j){if(e.onPageChange&&j&&(g!=j)){e.onPageChange(j)}g=j;a("[data-scroll-nav]").removeClass(e.activeClass);a("[data-scroll-nav="+j+"]").addClass(e.activeClass)};var h=function(){var j=a(window).scrollTop();var l=a("[data-scroll-index]").filter(function(m,n){return j>=a(n).offset().top&&j<a(n).offset().top+a(n).outerHeight()});var k=l.first().attr("data-scroll-index");f(k)};a(window).scroll(h).scroll();a(window).keydown(function(j){var k=j.which;if(k==e.upKey&&g>0){c(parseInt(g)-1);return false}else{if(k==e.downKey&&g<i){c(parseInt(g)+1);return false}}return true});a("[data-scroll-nav], [data-scroll-goto]").click(function(j){var k=a(j.target).attr("data-scroll-nav")||a(j.target).attr("data-scroll-goto");c(k)})}}(jQuery));
$(function() { $.scrollIt(); });