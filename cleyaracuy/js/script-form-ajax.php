$('#contenedor-pag').listen('click', 'input.btnFormAJAX', function(e){
	var idFormulario = $(this).parent().parent().attr("id");
	
	if(idFormulario == "buscar-efemerides"){
		var dia = $('select#dia option:selected').val();
		var mes = $('select#mes option:selected').val();
		$('#cont-form-efem').hide().html("<h2>Cargando...</h2>").show();
		var parametrosForm = "&dia=" + dia + "&mes=" + mes;
		$.ajax({
			url: "procesaFormulariosAJAX.php",	
			type: "POST",		
			data: parametrosForm,		
			cache: false,
			success: function(html) {	
				$('#cont-form-efem').hide().html(html);
				$('#cont-form-efem').fadeIn('slow');
			}		
		});
	}else if(idFormulario == "crear-tema-foro"){
		var tituloTema = $('input#titulo').val();
		var status = $('select#status option:selected').val();
		var contenidoTema = $('textarea#contenido').val();
        var CampoOculto = $('input#verforo').val();
		$('#cont-foro').hide().html("<h2>Cargando...</h2>").show();
		var parametrosForm = "&titulo=" + tituloTema + "&contenido=" + contenidoTema + "&status=" + status + "&verforo=" + CampoOculto;
		$.ajax({
			url: "secciones/foro/verforo_form_ajax.php",	
			type: "POST",		
			data: parametrosForm,		
			cache: false,
			success: function(html) {	
				$('#cont-foro').hide().html(html);
				$('#cont-foro').fadeIn('slow');
			}		
		});
	}else{e.preventDefault();}
});