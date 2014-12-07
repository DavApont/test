<script type="text/javascript" language="javascript">
function cambiarTituloPagina(){
	document.title = "CLEY - Informaci\xf3n - Galer\xeda de Im\xe1genes";
}
cambiarTituloPagina();
</script>

<script type="text/javascript" language="javascript">
$("#contImgPpal").scrollable({ 
    vertical: true, 
    size: 1, 
    clickable: false, 
    keyboard: 'static', 
    onSeek: function(event, i) { 
        horizontal.scrollable(i).focus(); 
    } 
}).navigator("#menuNavPpal"); 
 
var horizontal = $(".deslizable").scrollable({size: 1}).circular().navigator(".navi"); 
 
horizontal.eq(0).scrollable().focus();
</script>

<h1>Galer&iacute;a <acronym title="Consejo Legislativo del Estado Yaracuy">CLEY</acronym></h1>

<ul id="menuNavPpal"> 
    <li><strong>Parlamento Regional</strong>Estructura f&iacute;sica</li> 
    <li><strong>Sal&oacute;n de Sesiones</strong>&#8220;Hugo Rafael Ch&aacute;vez Fr&iacute;as&#8221;</li>
    <li><strong>Obras de Arte</strong>Trabajos nacionales</li> 
</ul> 
 
<div id="contImgPpal"> 
    <div id="paginas"> 
 
        <div class="pagina"> 
            <div class="navi"></div> 
            <div class="deslizable"> 
                <div class="items"> 
                    <div class="item"><img src="img/galeria/fachada.png" height="240" width="360" /></div> 
                    <div class="item"><img src="img/galeria/patio01.png" height="240" width="360" /></div>
                    <div class="item"><img src="img/galeria/patio02.png" height="240" width="360" /></div>
                    <div class="item"><img src="img/galeria/patio08.png" height="240" width="360" /></div>
                    <div class="item"><img src="img/galeria/patio06.png" height="240" width="360" /></div>
                    <div class="item"><img src="img/galeria/patio07.png" height="240" width="360" /></div>
                    <div class="item"><img src="img/galeria/patio03.png" height="240" width="360" /></div>
                    <div class="item"><img src="img/galeria/patio04.png" height="240" width="360" /></div>
                    <div class="item"><img src="img/galeria/patio05.png" height="240" width="360" /></div>
                </div> 
            </div> 
        </div> 
        <div class="navi"></div> 
 
        <div class="pagina"> 
            <div class="navi"></div> 
            <div class="deslizable"> 
                <div class="items"> 
                    <div class="item"><img src="img/galeria/salon01.png" height="240" width="360" /></div>
                    <div class="item"><img src="img/galeria/salon02.png" height="240" width="360" /></div>
                    <div class="item"><img src="img/galeria/salon03.png" height="240" width="360" /></div>
                    <div class="item"><img src="img/galeria/salon04.png" height="240" width="360" /></div>
                </div> 
            </div> 
        </div> 
        <div class="navi"></div> 
 
    </div> 
</div>