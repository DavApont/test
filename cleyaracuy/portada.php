<?php require_once('connections/cleyEnLinea.php'); ?>
<?php include('connections/estandares.php'); ?>
<?php
mysql_select_db($database_cleyenlinea, $cleyenlinea);
$query_imptitular = "SELECT * FROM noticias ORDER BY idnoticia DESC";
$countimptitular = mysql_query($query_imptitular, $cleyenlinea) or die(mysql_error());
$totalRows_imptitular = mysql_num_rows($countimptitular);
?>
<script type="text/javascript" language="javascript">
function cambiarTituloPagina(){
	document.title = ".:: Sitio Web Oficial del Consejo Legislativo del Estado Yaracuy ::.";
}
cambiarTituloPagina();
</script>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php //-- AQUÍ EMPIEZA LA CARTELERA DESLIZABLE QUE MUESTRA TITULARES DE LAS NOTICIAS MÁS RELEVANTES -- ?>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<script type="text/javascript" language="javascript">
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
(function(D){var A="Lite-1.0";D.fn.cycle=function(E){return this.each(function(){E=E||{};if(this.cycleTimeout){clearTimeout(this.cycleTimeout)}this.cycleTimeout=0;this.cyclePause=0;var I=D(this);var J=E.slideExpr?D(E.slideExpr,this):I.children();var G=J.get();if(G.length<2){if(window.console&&window.console.log){window.console.log("terminating; too few slides: "+G.length)}return }var H=D.extend({},D.fn.cycle.defaults,E||{},D.metadata?I.metadata():D.meta?I.data():{});H.before=H.before?[H.before]:[];H.after=H.after?[H.after]:[];H.after.unshift(function(){H.busy=0});var F=this.className;H.width=parseInt((F.match(/w:(\d+)/)||[])[1])||H.width;H.height=parseInt((F.match(/h:(\d+)/)||[])[1])||H.height;H.timeout=parseInt((F.match(/t:(\d+)/)||[])[1])||H.timeout;if(I.css("position")=="static"){I.css("position","relative")}if(H.width){I.width(H.width)}if(H.height&&H.height!="auto"){I.height(H.height)}var K=0;J.css({position:"absolute",top:0,left:0}).hide().each(function(M){D(this).css("z-index",G.length-M)});D(G[K]).css("opacity",1).show();if(D.browser.msie){G[K].style.removeAttribute("filter")}if(H.fit&&H.width){J.width(H.width)}if(H.fit&&H.height&&H.height!="auto"){J.height(H.height)}if(H.pause){I.hover(function(){this.cyclePause=1},function(){this.cyclePause=0})}D.fn.cycle.transitions.fade(I,J,H);J.each(function(){var M=D(this);this.cycleH=(H.fit&&H.height)?H.height:M.height();this.cycleW=(H.fit&&H.width)?H.width:M.width()});J.not(":eq("+K+")").css({opacity:0});if(H.cssFirst){D(J[K]).css(H.cssFirst)}if(H.timeout){if(H.speed.constructor==String){H.speed={slow:600,fast:200}[H.speed]||400}if(!H.sync){H.speed=H.speed/2}while((H.timeout-H.speed)<250){H.timeout+=H.speed}}H.speedIn=H.speed;H.speedOut=H.speed;H.slideCount=G.length;H.currSlide=K;H.nextSlide=1;var L=J[K];if(H.before.length){H.before[0].apply(L,[L,L,H,true])}if(H.after.length>1){H.after[1].apply(L,[L,L,H,true])}if(H.click&&!H.next){H.next=H.click}if(H.next){D(H.next).bind("click",function(){return C(G,H,H.rev?-1:1)})}if(H.prev){D(H.prev).bind("click",function(){return C(G,H,H.rev?1:-1)})}if(H.timeout){this.cycleTimeout=setTimeout(function(){B(G,H,0,!H.rev)},H.timeout+(H.delay||0))}})};function B(J,E,I,K){if(E.busy){return }var H=J[0].parentNode,M=J[E.currSlide],L=J[E.nextSlide];if(H.cycleTimeout===0&&!I){return }if(I||!H.cyclePause){if(E.before.length){D.each(E.before,function(N,O){O.apply(L,[M,L,E,K])})}var F=function(){if(D.browser.msie){this.style.removeAttribute("filter")}D.each(E.after,function(N,O){O.apply(L,[M,L,E,K])})};if(E.nextSlide!=E.currSlide){E.busy=1;D.fn.cycle.custom(M,L,E,F)}var G=(E.nextSlide+1)==J.length;E.nextSlide=G?0:E.nextSlide+1;E.currSlide=G?J.length-1:E.nextSlide-1}if(E.timeout){H.cycleTimeout=setTimeout(function(){B(J,E,0,!E.rev)},E.timeout)}}function C(E,F,I){var H=E[0].parentNode,G=H.cycleTimeout;if(G){clearTimeout(G);H.cycleTimeout=0}F.nextSlide=F.currSlide+I;if(F.nextSlide<0){F.nextSlide=E.length-1}else{if(F.nextSlide>=E.length){F.nextSlide=0}}B(E,F,1,I>=0);return false}D.fn.cycle.custom=function(K,H,I,E){var J=D(K),G=D(H);G.css({opacity:0});var F=function(){G.animate({opacity:1},I.speedIn,I.easeIn,E)};J.animate({opacity:0},I.speedOut,I.easeOut,function(){J.css({display:"none"});if(!I.sync){F()}});if(I.sync){F()}};D.fn.cycle.transitions={fade:function(F,G,E){G.not(":eq(0)").css("opacity",0);E.before.push(function(){D(this).show()})}};D.fn.cycle.ver=function(){return A};D.fn.cycle.defaults={timeout:4000,speed:1000,next:null,prev:null,before:null,after:null,height:"auto",sync:1,fit:0,pause:0,delay:0,slideExpr:null}})(jQuery)
$('#cont-webs-amigas').cycle({
		fx: 'fade',
		speed: 500,
		timeout: 5000,
		pause: 1
});
</script>
<div class="scrollable">
	<div class="items">
        <?php include("secciones/muestratitulares.php"); ?>		
	</div>
</div>
<a class="prev"></a>
<a class="next"></a>
<br clear="all" />
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<?php //-- AQUÍ TERMINA LA CARTELERA DESLIZABLE -- ?>
<?php //---------------------------------------------------------------------------------------------------------------- ?>
<script type="text/javascript">
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
$("ul#cintillo").cintilloDeslizable({velocidad: 0.03}); 
</script>
<?php include("secciones/muestratitulares2.php"); ?>

<div id="cont-webs-amigas">
	<span>
        <a class="websAmigas" href="http://www.presidencia.gob.ve/" title="Ministerio del Poder Popular del Despacho de la Presidencia" target="_blank"></a>
        <a class="websAmigas" href="http://www.asambleanacional.gob.ve/" title="Asamblea Nacional" target="_blank"></a>
        <a class="websAmigas" href="http://www.yaracuy.gob.ve/" title="Gobierno Bolivariano del Estado Yaracuy" target="_blank"></a>
        <a class="websAmigas" href="http://www.cgr.gob.ve/" title="Contralor&iacute;a General de la Rep&uacute;blica" target="_blank"></a>
        <a class="websAmigas" href="http://www.tsj.gov.ve/" title="Tribunal Supremo de Justicia" target="_blank"></a>
        <a class="websAmigas" href="http://www.fiscalia.gov.ve/" title="Ministerio P&uacute;blico" target="_blank"></a>
        <a class="websAmigas" href="http://www.defensoria.gob.ve/" title="Defensor&iacute;a del Pueblo" target="_blank"></a>
    </span>
	<span>
        <a class="websAmigas" href="http://www.alopresidente.gob.ve/" title="Al&oacute; Presidente" target="_blank"></a>
        <a class="websAmigas" href="http://www.venezueladeverdad.gob.ve/" title="Venezuela de Verdad" target="_blank"></a>
    </span>
	<span>
        <a class="websAmigas" href="http://www.antv.gob.ve/" title="Fundaci&oacute;n Televisora de la Asamblea Nacional" target="_blank"></a>
        <a class="websAmigas" href="http://www.vtv.gov.ve/" title="Venezolana de Televisi&oacute;n" target="_blank"></a>
        <a class="websAmigas" href="http://www.tves.org.ve/" title="Televisora Venezolana Educativa y Socialista" target="_blank"></a>
        <a class="websAmigas" href="http://www.vive.gob.ve/" title="ViVe Televisora" target="_blank"></a>
        <a class="websAmigas" href="http://www.telesurtv.net/" title="Telesur" target="_blank"></a>
    </span>
    <span>
        <a class="websAmigas" href="http://www.abn.info.ve/" title="Agencia Bolivariana de Noticias" target="_blank"></a>
        <a class="websAmigas" href="http://www.rnv.gov.ve/" title="Radio Nacional de Venezuela" target="_blank"></a>
        <a class="websAmigas" href="http://www.radiomundial.com.ve/yvke/" title="Radio YVKE Mundial" target="_blank"></a>
        <a class="websAmigas" href="http://www.laradiodelsur.com/" title="La Radio del Sur" target="_blank"></a>
    </span>
</div>