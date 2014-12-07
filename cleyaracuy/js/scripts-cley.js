/* Conjunto de Scripts desarrollados para el sitio web del CLEY
 * Copyright (c) 2009 - Javier Colmenárez (+58 412 665 5786 - biohazard.jc@gmail.com)
 * Utilizando la librería jQuery 1.3.2
 * Fecha: 2009-10-10 20:18:23 - (Sábado, 10 Oct 2009)
 * Revisión: 01
 * La reproducción, utilización, venta y copia no autorizada de alguno de los scripts en este archivo esta prohibida totalmente.



function detectarNavegador(){
	var navegador = $.browser;
	if(navegador.mozilla){
		$('a[href="http://www.mozilla-europe.org/es/firefox/"]').hide();
	}else if(navegador.msie){
		if(navegador.version > 6.1){
			alert('Estimado Usuario hemos detectado que estás utilizando Internet Explorer de Microsoft, debido a sus grandes fallas, sus múltiples errores y su falta de estandarización te recomendamos descargar Mozilla Firefox para disfrutar de una mejor y más eficiente experiencia de navegación, no sólo en nuestra página web sino para toda la red.');
		}else{
			window.location.replace("http://cleyaracuy.gob.ve/ie6-error.htm");
		}
	}else if(navegador.safari){
		alert('Estimado Usuario hemos detectado que estás utilizando Safari para navegar. Aunque es un navegador que respeta más los estándares que otros navegadores desastrosos como Internet Explorer de Microsoft, te recomendamos descargar e instalar Mozilla Firefox para disfrutar de una mejor y más eficiente experiencia de navegación en nuestro sitio web.');
	}else if(navegador.opera){
		alert('Estimado Usuario hemos detectado que estás utilizando Opera para navegar. Aunque es un navegador que respeta más los estándares que otros navegadores desastrosos como Internet Explorer de Microsoft, te recomendamos descargar e instalar Mozilla Firefox para disfrutar de una mejor y más eficiente experiencia de navegación en nuestro sitio web.');
	}else{
		alert('Estimado Usuario hemos detectado que estás utilizando un navegador web que no se encuentra completamente estandarizado. Aunque es un navegador que respeta más los estándares que otros navegadores desastrosos como Internet Explorer de Microsoft, te recomendamos descargar e instalar Mozilla Firefox para disfrutar de una mejor y más eficiente experiencia de navegación en nuestro sitio web.');
	}
}

*/
// <------------------------------------------------------------------------------------------------------------------------------------->
// AQUÍ COMIENZA LA PARTE DEL EFECTO DE DESPLIEGUE DEL MENÚ DE NAVEGACIÓN PRINCIPAL DEL SITIO WEB DEL CLEY
function menuNav(){
	$("#contMenu div.1erGrupoItems").css({display: "none"});
	$("#contMenu div.2doGrupoItems").css({display: "none"});
	$("#contMenu div.item1").hover(
		function(){$(this).find("div:first").css({visibility: "visible", display: "none", margin: "40px 0px 0px 20px"}).show(200)},
		function(){$(this).find("div:first").css({visibility: "hidden"});});
	$("#contMenu div.item2, #contMenu div.item3, #contMenu div.item4, #contMenu div.item5, #contMenu div.item6").hover(
		function(){$(this).find("div:first").css({visibility: "visible", display: "none", margin: "40px 0px 0px 0px"}).show(200)},
		function(){$(this).find("div:first").css({visibility: "hidden"});});
	$("#contMenu div.itemSubMenu1").hover(
		function(){$(this).find("div:first").css({margin: "-25px 0px 0px 125px", visibility: "visible", display: "none"}).show(0)},
		function(){$(this).find("div:first").css({visibility: "hidden"});});
}
// AQUÍ TERMINA LA PARTE DEL EFECTO DE DESPLIEGUE DEL MENÚ DE NAVEGACIÓN PRINCIPAL DEL SITIO WEB DEL CLEY
// <------------------------------------------------------------------------------------------------------------------------------------->


// <------------------------------------------------------------------------------------------------------------------------------------->
// AQUÍ COMIENZA LA PARTE DEL EFECTO DE VENTANAS EMERGENTES Y SU RESALTADO
function ventanaEmergente(){
	$("a.disparador[rel]").overlay({
		top: '3%',
		speed: 350,
		effect: 'apple',
		expose: {color: '#456', opacity: 0.5, loadspeed: 'fast'}
	});
}
// AQUÍ TERMINA LA PARTE DEL EFECTO DE VENTANAS EMERGENTES Y SU RESALTADO
//<------------------------------------------------------------------------------------------------------------------------------------->


// <------------------------------------------------------------------------------------------------------------------------------------->
// AQUÍ COMIENZA LA PARTE DEL EFECTO DE DESPLAZAMIENTO DE LOS BOTONES DEL PANEL IZQUIERDO
function animBtnsIzq(){
	$("div#sec-ppal a").hover(
		function(){$(this).animate({marginLeft: "20px"}, "fast", "swing")},
		function(){$(this).animate({marginLeft: "10px"}, "fast", "swing");}
	);
}
// AQUÍ TERMINA LA PARTE DEL EFECTO DE DESPLAZAMIENTO DE LOS BOTONES DEL PANEL IZQUIERDO
//<------------------------------------------------------------------------------------------------------------------------------------->


// <------------------------------------------------------------------------------------------------------------------------------------->
// AQUÍ ESTÁN LAS LLAMADAS AL EFECTO DE LABELS DENTRO DE LOS INPUTS DE TEXTO
function textoEnCaja(){
	jQuery.fn.smartFocus = function(text) {
		$(this).val(text).focus(function(){
			if($(this).val() == text){
				$(this).val('');
			}
		}).blur(function(){
			if( $(this).val() == '' ){
				$(this).val(text);
			}
		});
	};
	$(".cajaBusq").smartFocus("Escribe y Selecciona");
	$(".introduce-apellido").smartFocus("Apellidos");
	$(".introduce-nombre").smartFocus("Nombres");
	$(".introduce-ci").smartFocus("Cédula de Identidad");
	$(".introduce-tlf").smartFocus("Teléfono");
	$(".introduce-email").smartFocus("Tu Correo Electrónico");
	$(".introduce-msj").smartFocus("Tu mensaje aquí. Lo que quieras escribir");
	$("#usuario").smartFocus("Nombre de Usuario");
	$("#contrasena").smartFocus("123456");
}
// <------------------------------------------------------------------------------------------------------------------------------------->


// <------------------------------------------------------------------------------------------------------------------------------------->
// AQUÍ ESTÁ EL EFECTO DE LAS WEBS AMIGAS
(function(D){var A="Lite-1.0";D.fn.cycle=function(E){return this.each(function(){E=E||{};if(this.cycleTimeout){clearTimeout(this.cycleTimeout)}this.cycleTimeout=0;this.cyclePause=0;var I=D(this);var J=E.slideExpr?D(E.slideExpr,this):I.children();var G=J.get();if(G.length<2){if(window.console&&window.console.log){window.console.log("terminating; too few slides: "+G.length)}return }var H=D.extend({},D.fn.cycle.defaults,E||{},D.metadata?I.metadata():D.meta?I.data():{});H.before=H.before?[H.before]:[];H.after=H.after?[H.after]:[];H.after.unshift(function(){H.busy=0});var F=this.className;H.width=parseInt((F.match(/w:(\d+)/)||[])[1])||H.width;H.height=parseInt((F.match(/h:(\d+)/)||[])[1])||H.height;H.timeout=parseInt((F.match(/t:(\d+)/)||[])[1])||H.timeout;if(I.css("position")=="static"){I.css("position","relative")}if(H.width){I.width(H.width)}if(H.height&&H.height!="auto"){I.height(H.height)}var K=0;J.css({position:"absolute",top:0,left:0}).hide().each(function(M){D(this).css("z-index",G.length-M)});D(G[K]).css("opacity",1).show();if(D.browser.msie){G[K].style.removeAttribute("filter")}if(H.fit&&H.width){J.width(H.width)}if(H.fit&&H.height&&H.height!="auto"){J.height(H.height)}if(H.pause){I.hover(function(){this.cyclePause=1},function(){this.cyclePause=0})}D.fn.cycle.transitions.fade(I,J,H);J.each(function(){var M=D(this);this.cycleH=(H.fit&&H.height)?H.height:M.height();this.cycleW=(H.fit&&H.width)?H.width:M.width()});J.not(":eq("+K+")").css({opacity:0});if(H.cssFirst){D(J[K]).css(H.cssFirst)}if(H.timeout){if(H.speed.constructor==String){H.speed={slow:600,fast:200}[H.speed]||400}if(!H.sync){H.speed=H.speed/2}while((H.timeout-H.speed)<250){H.timeout+=H.speed}}H.speedIn=H.speed;H.speedOut=H.speed;H.slideCount=G.length;H.currSlide=K;H.nextSlide=1;var L=J[K];if(H.before.length){H.before[0].apply(L,[L,L,H,true])}if(H.after.length>1){H.after[1].apply(L,[L,L,H,true])}if(H.click&&!H.next){H.next=H.click}if(H.next){D(H.next).bind("click",function(){return C(G,H,H.rev?-1:1)})}if(H.prev){D(H.prev).bind("click",function(){return C(G,H,H.rev?1:-1)})}if(H.timeout){this.cycleTimeout=setTimeout(function(){B(G,H,0,!H.rev)},H.timeout+(H.delay||0))}})};function B(J,E,I,K){if(E.busy){return }var H=J[0].parentNode,M=J[E.currSlide],L=J[E.nextSlide];if(H.cycleTimeout===0&&!I){return }if(I||!H.cyclePause){if(E.before.length){D.each(E.before,function(N,O){O.apply(L,[M,L,E,K])})}var F=function(){if(D.browser.msie){this.style.removeAttribute("filter")}D.each(E.after,function(N,O){O.apply(L,[M,L,E,K])})};if(E.nextSlide!=E.currSlide){E.busy=1;D.fn.cycle.custom(M,L,E,F)}var G=(E.nextSlide+1)==J.length;E.nextSlide=G?0:E.nextSlide+1;E.currSlide=G?J.length-1:E.nextSlide-1}if(E.timeout){H.cycleTimeout=setTimeout(function(){B(J,E,0,!E.rev)},E.timeout)}}function C(E,F,I){var H=E[0].parentNode,G=H.cycleTimeout;if(G){clearTimeout(G);H.cycleTimeout=0}F.nextSlide=F.currSlide+I;if(F.nextSlide<0){F.nextSlide=E.length-1}else{if(F.nextSlide>=E.length){F.nextSlide=0}}B(E,F,1,I>=0);return false}D.fn.cycle.custom=function(K,H,I,E){var J=D(K),G=D(H);G.css({opacity:0});var F=function(){G.animate({opacity:1},I.speedIn,I.easeIn,E)};J.animate({opacity:0},I.speedOut,I.easeOut,function(){J.css({display:"none"});if(!I.sync){F()}});if(I.sync){F()}};D.fn.cycle.transitions={fade:function(F,G,E){G.not(":eq(0)").css("opacity",0);E.before.push(function(){D(this).show()})}};D.fn.cycle.ver=function(){return A};D.fn.cycle.defaults={timeout:4000,speed:1000,next:null,prev:null,before:null,after:null,height:"auto",sync:1,fit:0,pause:0,delay:0,slideExpr:null}})(jQuery)
function websAmigas(){
	$('#cont-webs-amigas').cycle({
		fx: 'fade',
		speed: 500,
		timeout: 5000,
		pause: 1
	});
}

function animacionCabecera(){
	$('#img-anim-cabecera').cycle({
		fx: 'fade',
		speed: 500,
		timeout: 3000,
		pause: 0
	});
}
// <------------------------------------------------------------------------------------------------------------------------------------->


// <------------------------------------------------------------------------------------------------------------------------------------->
// AQUÍ COMIENZA LA PARTE DEL CINTILLO INFORMATIVO
//
jQuery.fn.cintilloDeslizable = function(opciones) {
		opciones = jQuery.extend({
		velocidad: 0.07
		}, opciones);		
		return this.each(function(){
				var $cintillo = jQuery(this);
				$cintillo.addClass("cintilloInformativo")
				var anchoCintillo = 0;
				var $mascara = $cintillo.wrap("<div class='mascara'></div>");
				var $contenedorCintillo = $cintillo.parent().wrap("<div class='contenedorCintillo'></div>");								
				var anchoContenedor = $cintillo.parent().parent().width();	//a.k.a. 'mascara' width 	
				$cintillo.find("li").each(function(i){
				anchoCintillo += jQuery(this, i).width();
				});
				$cintillo.width(anchoCintillo);			
				var sincronizado = anchoCintillo/opciones.velocidad;
				var totalVuelta = anchoCintillo+anchoContenedor;								
				function deslizaNoticias(espacio, tempo){
				$cintillo.animate({left: '-='+ espacio}, tempo, "linear", function(){$cintillo.css("left", anchoContenedor); deslizaNoticias(totalVuelta, sincronizado);});
				}
				deslizaNoticias(totalVuelta, sincronizado);				
				$cintillo.hover(function(){
				jQuery(this).stop();
				},
				function(){
				var posicion = jQuery(this).offset();
				var espacioRestante = posicion.left + anchoCintillo;
				var tiempoRestante = espacioRestante/opciones.velocidad;
				deslizaNoticias(espacioRestante, tiempoRestante);
				});			
		});	
};
function cintilloInformativo(){
    $("ul#cintillo").cintilloDeslizable({velocidad: 0.03}); 
}
// <------------------------------------------------------------------------------------------------------------------------------------->
//


// <------------------------------------------------------------------------------------------------------------------------------------->
// AQUÍ COMIENZA LA PARTE JS-FUENTE DEL EFECTO DE DESLIZAMIENTO (jQuery.scrollable 1.0.2)
//
function carteleraDeslizable(){
	$("div.scrollable").scrollable({
		easing: 'suavizado',
        size: 1,
        speed: 600,
		clickable: false,
        onBeforeSeek: function() { 
            this.getItems().fadeTo('fast', 0.2);         
        }, 
        onSeek: function() { 
            this.getItems().fadeTo('normal', 1);
        } 
    }).circular().autoscroll(6000);
}
// <------------------------------------------------------------------------------------------------------------------------------------->
//


// <------------------------------------------------------------------------------------------------------------------------------------->
// AQUÍ COMIENZA LA PARTE JS-FUENTE DEL EFECTO DE EASING (jQuery.easing 1.3)
jQuery.easing['jswing']=jQuery.easing['swing'];jQuery.extend(jQuery.easing,{def:'easeOutQuad',swing:function(x,t,b,c,d){return jQuery.easing[jQuery.easing.def](x,t,b,c,d);},easeInQuad:function(x,t,b,c,d){return c*(t/=d)*t+b;},easeOutQuad:function(x,t,b,c,d){return -c*(t/=d)*(t-2)+b;},easeInOutQuad:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t+b;return -c/2 *((--t)*(t-2)-1)+b;},easeInCubic:function(x,t,b,c,d){return c*(t/=d)*t*t+b;},easeOutCubic:function(x,t,b,c,d){return c*((t=t/d-1)*t*t+1)+b;},easeInOutCubic:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t+b;return c/2*((t-=2)*t*t+2)+b;},easeInQuart:function(x,t,b,c,d){return c*(t/=d)*t*t*t+b;},easeOutQuart:function(x,t,b,c,d){return -c *((t=t/d-1)*t*t*t-1)+b;},easeInOutQuart:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t+b;return -c/2 *((t-=2)*t*t*t-2)+b;},easeInQuint:function(x,t,b,c,d){return c*(t/=d)*t*t*t*t+b;},easeOutQuint:function(x,t,b,c,d){return c*((t=t/d-1)*t*t*t*t+1)+b;},easeInOutQuint:function(x,t,b,c,d){if((t/=d/2)<1)return c/2*t*t*t*t*t+b;return c/2*((t-=2)*t*t*t*t+2)+b;},easeInSine:function(x,t,b,c,d){return -c*Math.cos(t/d*(Math.PI/2))+c+b;},easeOutSine:function(x,t,b,c,d){return c * Math.sin(t/d*(Math.PI/2))+b;},easeInOutSine:function(x,t,b,c,d){return -c/2 *(Math.cos(Math.PI*t/d)-1)+b;},easeInExpo:function(x,t,b,c,d){return (t==0)?b:c*Math.pow(2,10*(t/d-1))+b;},easeOutExpo:function(x,t,b,c,d){return (t==d)?b+c:c*(-Math.pow(2,-10*t/d)+1)+b;},easeInOutExpo:function(x,t,b,c,d){if(t==0)return b;if(t==d)return b+c;if((t/=d/2)<1)return c/2*Math.pow(2,10*(t-1))+b;return c/2*(-Math.pow(2,-10*--t)+2)+b;},easeInCirc:function(x,t,b,c,d){return -c*(Math.sqrt(1-(t/=d)*t)-1)+b;},easeOutCirc:function(x,t,b,c,d){return c*Math.sqrt(1-(t=t/d-1)*t)+b;},easeInOutCirc:function(x,t,b,c,d){if((t/=d/2)<1)return -c/2*(Math.sqrt(1-t*t)-1)+b;return c/2*(Math.sqrt(1-(t-=2)*t)+1)+b;},easeInElastic:function(x,t,b,c,d){var s=1.70158;var p=0;var a=c;if (t==0)return b;if ((t/=d)==1)return b+c;if (!p) p=d*.3;if (a < Math.abs(c)) { a=c; var s=p/4; }else var s = p/(2*Math.PI) * Math.asin (c/a);return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;},easeOutElastic: function (x, t, b, c, d) {var s=1.70158;var p=0;var a=c;if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;if (a < Math.abs(c)) { a=c; var s=p/4; }else var s = p/(2*Math.PI) * Math.asin (c/a);return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;},easeInOutElastic: function (x, t, b, c, d) {var s=1.70158;var p=0;var a=c;if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);if (a < Math.abs(c)) { a=c; var s=p/4; }else var s = p/(2*Math.PI) * Math.asin (c/a);if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;},easeInBack: function (x, t, b, c, d, s) {if (s == undefined) s = 1.70158;return c*(t/=d)*t*((s+1)*t - s) + b;},easeOutBack: function (x, t, b, c, d, s) {if (s == undefined) s = 1.70158;return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;},easeInOutBack: function (x, t, b, c, d, s) {if (s == undefined) s = 1.70158; if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;},easeInBounce: function (x, t, b, c, d) {return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;},easeOutBounce: function (x, t, b, c, d) {if ((t/=d) < (1/2.75)) {return c*(7.5625*t*t) + b;} else if (t < (2/2.75)) {return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;} else if (t < (2.5/2.75)) {return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;} else {return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;}},easeInOutBounce: function (x, t, b, c, d) {if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;}});
// AQUÍ TERMINA LA PARTE JS-FUENTE DEL EFECTO DE EASING (jQuery.easing 1.3)

// AQUÍ ESTÁN LAS LLAMADAS AL EFECTO EASING ANTERIOR
function easingPiePag(){
	$("div#contMapa").css({display: "none"});
	metodo = "easeInBack";
	$("a#dispMapa").toggle(
		function(){$("div.easingPie").animate({height: 100}, {duration: 1000, easing: metodo})+$("div#contMapa").show(1300);},
		function(){$("div.easingPie").animate({height: 40}, {duration: 600, easing: metodo})+$("div#contMapa").hide(1000);}
	);
}
// <------------------------------------------------------------------------------------------------------------------------------------->

// <------------------------------------------------------------------------------------------------------------------------------------->
// AQUÍ COMIENZA LA PARTE DEL EFECTO DE NAVEGACIÓN POR PESTAÑAS
//
function navPest(){
	$("ul.tabs").tabs("div.panes > div");
}

function acordionInformativo(){
	$("#accordion").tabs("#accordion div.pane", {tabs: 'h2', effect: 'slide', initialIndex: null});
}

// <------------------------------------------------------------------------------------------------------------------------------------->
function elegirOpcion(e){
	return confirm(e);
}