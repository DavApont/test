// Conjunto de Scripts desarrollados para el Sistema de Manejo de Contenido del sitio web del CLEY

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
	$(".introduce-antetitulo").smartFocus("Escribe aquí el antetítulo de la noticia");
	$(".introduce-titulo").smartFocus("Escribe aquí el título principal de la noticia");
	$(".introduce-titular").smartFocus("Escribe aquí el titulo (50 caracteres máx.)");
	$(".titulo-art").smartFocus("Escribe aquí el título del artículo");
	$(".titulo-ley").smartFocus("Escribe aquí el título completo de la Ley o Proyecto");
	$(".nro-documento").smartFocus("Nro. Documento");
	$(".nro-gaceta").smartFocus("Nro. de Gaceta");
	$(".nro-sesion").smartFocus("Sesión Nro");
	$(".nro-oficio").smartFocus("Oficio Nro");
	$(".monto-bs").smartFocus("Monto en BsF");
	$("#titulo-h").smartFocus("Escribe aquí el título principal del artículo de historia");
	$("#titulo-e").smartFocus("Escribe aquí el título principal de la efémerides regional");
}
// <------------------------------------------------------------------------------------------------------------------------------------->

// <------------------------------------------------------------------------------------------------------------------------------------->
// AQUÍ ESTÁ EL EFECTO DEL CALENDARIO EMERGENTE
function calendario() {
		$(".selecciona-fecha").datepicker({showOn: 'button', buttonImage: 'js/jquery-ui/development-bundle/demos/datepicker/images/ayuda.png', buttonImageOnly: true});
		$('.selecciona-fecha').datepicker('option', {dateFormat: 'yy-mm-dd'});
		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '&#x3c;Ant',
			nextText: 'Sig&#x3e;',
			currentText: 'Hoy',
			monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
			'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
			'Jul','Ago','Sep','Oct','Nov','Dic'],
			dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
			dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
			dateFormat: 'dd/mm/yy', firstDay: 0,
			isRTL: false};
		$.datepicker.setDefaults($.datepicker.regional['es']);
}
// <------------------------------------------------------------------------------------------------------------------------------------->

	function camposDinamicosSesiones(){
		$("select.tipo-sesion").change(function(){
			var valor = " ";
			$("select.tipo-sesion option:selected").each(function(){
				valor += $(this).attr("value");
			});
			if(valor == 1){
				$("div#campos-extraordinaria").children().remove();
				$("div#campos-solemne").hide(200);
				$("div#campos-delegada1").children().remove();
				$("div#campos-delegada2").children().remove();
				$("div#campos-ordinaria").append('<a href="#" class="disparador_dp">Derecho de Palabra</a><a href="#" class="disparador_ic">Invitaci&oacute;n de Comparecencia</a><a href="#" class="disparador_rc">Remisi&oacute;n a Comisi&oacute;n</a>');
				$("div#sinTipoSesion").hide(200);
			}
			else if(valor == 2){
				$("div#campos-ordinaria").children().remove();
				$("div#campos-solemne").hide(200);
				$("div#campos-delegada1").children().remove();
				$("div#campos-delegada2").children().remove();
				$("div#campos-extraordinaria").append('<a href="#" class="disparador_dp">Derecho de Palabra</a><a href="#" class="disparador_ic">Invitaci&oacute;n de Comparecencia</a><a href="#" class="disparador_rc">Remisi&oacute;n a Comisi&oacute;n</a>');
				$("div#sinTipoSesion").hide(200);
			}
			else if(valor == 3){
				$("div#campos-ordinaria").children().remove();
				$("div#campos-extraordinaria").children().remove();
				$("div#campos-delegada1").children().remove();
				$("div#campos-delegada2").children().remove();
				$("div#campos-solemne").show(200);
				$("div#sinTipoSesion").hide(200);
			}
			else if(valor == 4){
				$("div#campos-ordinaria").children().remove();
				$("div#campos-extraordinaria").children().remove();
				$("div#campos-solemne").hide(200);
				$("div#campos-delegada2").children().remove();
				$("div#campos-delegada1").append('<a href="#" class="disparador_dp">Derecho de Palabra</a><a href="#" class="disparador_ic">Invitaci&oacute;n de Comparecencia</a><a href="#" class="disparador_rc">Remisi&oacute;n a Comisi&oacute;n</a>');
				$("div#sinTipoSesion").hide(200);
			}
			else if(valor == 5){
				$("div#campos-ordinaria").children().remove();
				$("div#campos-extraordinaria").children().remove();
				$("div#campos-solemne").hide(200);
				$("div#campos-delegada1").children().remove();
				$("div#campos-delegada2").append('<a href="#" class="disparador_dp">Derecho de Palabra</a><a href="#" class="disparador_ic">Invitaci&oacute;n de Comparecencia</a><a href="#" class="disparador_rc">Remisi&oacute;n a Comisi&oacute;n</a>');
				$("div#sinTipoSesion").hide(200);
			}
			else{
				$("div#campos-ordinaria").children().remove();
				$("div#campos-extraordinaria").children().remove();
				$("div#campos-solemne").hide(200);
				$("div#campos-delegada1").children().remove();
				$("div#campos-delegada2").children().remove();
				$("div#sinTipoSesion").show(200);
			}
		})
		.change();
	}

// <------------------------------------------------------------------------------------------------------------------------------------->
	function camposDinamicosDocs(){
		$("select.tipo-doc").change(function(){
			var valor = " ";
			$("select.tipo-doc option:selected").each(function(){
				valor += $(this).attr("value");
			});
			if(valor == 1 || valor == 2 || valor == 3 || valor == 4){
				$("div#sinTipoDoc").hide(200);
				$("div#campos-cley1").children().remove();
				$("div#campos-cley2").children().remove();
				$("div#campos-gob").children().remove();
				$("div#campos-gob").append('<input type="text" name="nro_doc" class="nro-documento" size="12" style="padding:3px;margin-right:5px;width:auto;display:inline;" /><input type="text" name="nro_oficio" class="nro-oficio" size="10" style="padding:3px;margin-right:10px;width:auto;display:inline;" /><input type="text" name="monto_bs" class="monto-bs" size="25" style="padding:3px;margin-right:10px;width:auto;display:inline;" />');
				$("div#campos-gob").find("input.nro-documento:last").smartFocus("Nro. Documento");
				$("div#campos-gob").find("input.nro-oficio:last").smartFocus("Oficio Nro");
				$("div#campos-gob").find("input.monto-bs:last").smartFocus("Monto en BsF");
			}
			else if(valor == 5 || valor == 6){
				$("div#sinTipoDoc").hide(200);
				$("div#campos-gob").children().remove();
				$("div#campos-cley2").children().remove();
				$("div#campos-cley1").children().remove();
				$("div#campos-cley1").append('<input type="text" name="nro_doc" class="nro-documento" size="12" style="padding:3px;margin-right:5px;width:auto;display:inline;" /><input type="text" name="monto_bs" class="monto-bs" size="25" style="padding:3px;margin-right:15px;width:auto;display:inline;" />');
				$("div#campos-cley1").find("input.nro-documento:last").smartFocus("Nro. Documento");
				$("div#campos-cley1").find("input.monto-bs:last").smartFocus("Monto en BsF");
			}
			else if(valor == 7 || valor == 8){
				$("div#sinTipoDoc").hide(200);
				$("div#campos-gob").children().remove();
				$("div#campos-cley1").children().remove();
				$("div#campos-cley2").children().remove();
				$("div#campos-cley2").append('<input type="text" name="nro_doc" class="nro-documento" size="12" style="padding:3px;margin-right:5px;width:auto;display:inline;" />');
				$("div#campos-cley2").find("input.nro-documento:last").smartFocus("Nro. Documento");
			}
			else if(valor == 0){
				$("div#sinTipoDoc").show(200);
				$("div#campos-gob").children().remove();
				$("div#campos-cley1").children().remove();
				$("div#campos-cley2").children().remove();
			}
			else{
				$("div#sinTipoDoc").hide(200);
				$("div#campos-gob").children().remove();
				$("div#campos-cley1").children().remove();
				$("div#campos-cley2").children().remove();
			}
		})
		.change();
	}
// <------------------------------------------------------------------------------------------------------------------------------------->

// <------------------------------------------------------------------------------------------------------------------------------------->
// Aquí va el script para crear y eliminar campos en el módulo Cargar Sesión
	function crearDerechoPalabra(){
//		alert("Hola Mundo!");
		var nroPosicion = 1;
		$("form#carses").listen('click', 'a.disparador_dp', function(){
			var nombreA = "persona-dp" + nroPosicion;
			var nombreB = "motivo-dp" + nroPosicion;
			var nombreC = "decision-dp" + nroPosicion;
			$("<div><input type='text' class='persona_dp' size='40' style='width:auto;' /><input type='text' class='motivo_dp' /><input type='text' class='decision_dp' /><a href='#' class='eliminar_dp'>Eliminar Derecho de Palabra</a><hr class='division_dp' /></div>").insertBefore(this);
			$("div#campos-ordinaria").find(".persona_dp:last").smartFocus("Ciudadano que utilizó el Derecho de Palabra");
			$("div#campos-ordinaria").find(".motivo_dp:last").smartFocus("Motivo o asunto tratado en el Derecho de Palabra");
			$("div#campos-ordinaria").find(".decision_dp:last").smartFocus("Decisión o acción tomada por la Plenaria sobre el Derecho de Palabra");
			$("div#campos-ordinaria").find("a.eliminar_dp").click(function(){$(this).parent().remove();});
			$("div#campos-extraordinaria").find(".persona_dp:last").smartFocus("Ciudadano que utilizó el Derecho de Palabra");
			$("div#campos-extraordinaria").find(".motivo_dp:last").smartFocus("Motivo o asunto tratado en el Derecho de Palabra");
			$("div#campos-extraordinaria").find(".decision_dp:last").smartFocus("Decisión o acción tomada por la Plenaria sobre el Derecho de Palabra");
			$("div#campos-extraordinaria").find("a.eliminar_dp").click(function(){$(this).parent().remove();});
			$("div#campos-delegada1").find(".persona_dp:last").smartFocus("Ciudadano que utilizó el Derecho de Palabra");
			$("div#campos-delegada1").find(".motivo_dp:last").smartFocus("Motivo o asunto tratado en el Derecho de Palabra");
			$("div#campos-delegada1").find(".decision_dp:last").smartFocus("Decisión o acción tomada por la Plenaria sobre el Derecho de Palabra");
			$("div#campos-delegada1").find("a.eliminar_dp").click(function(){$(this).parent().remove();});
			$("div#campos-delegada2").find(".persona_dp:last").smartFocus("Ciudadano que utilizó el Derecho de Palabra");
			$("div#campos-delegada2").find(".motivo_dp:last").smartFocus("Motivo o asunto tratado en el Derecho de Palabra");
			$("div#campos-delegada2").find(".decision_dp:last").smartFocus("Decisión o acción tomada por la Plenaria sobre el Derecho de Palabra");
			$("div#campos-delegada2").find("a.eliminar_dp").click(function(){$(this).parent().remove();});
			$("input.persona_dp:last").attr({name: nombreA, id: nombreA});
			$("input.motivo_dp:last").attr({name: nombreB, id: nombreB});
			$("input.decision_dp:last").attr({name: nombreC, id: nombreC});
			nroPosicion ++;
		});
	}
	
	function crearComparecencia(){
		var nroPosicion = 1;
		$.listen('click', 'a.disparador_ic', function(){
			var nombreA = "nro-ic" + nroPosicion;
			var nombreB = "persona-ic" + nroPosicion;
			var nombreC = "ente-ic" + nroPosicion;
			$("a.disparador_dp").css({'display' : 'block', 'margin-bottom' : '40px'});
			$("a.disparador_ic").css({'margin-right' : '40px'});
			$("<div><select class='nro_ic' style='padding:5px;margin-right:15px;'><option selected='selected' value='NULL'>N&uacute;mero de invitaci&oacute;n</option><option value='1'>1era Invitaci&oacute;n</option><option value='2'>2da Invitaci&oacute;n</option><option value='3'>3era Invitaci&oacute;n</option></select><input type='text' class='persona_ic' size='40' style='width:auto;display:inline;' /><input type='text' class='ente_ic' /><a href='#' class='eliminar_ic'>Eliminar Invitaci&oacute;n de Comparecencia</a><hr class='division_ic' /></div>").insertBefore(this);
			$("div#campos-ordinaria").find(".persona_ic:last").smartFocus("Ciudadano que se invita a comparecer");
			$("div#campos-ordinaria").find(".ente_ic:last").smartFocus("Ente, institución u organización representada por el ciudadano invitado a comparecer");
			$("div#campos-ordinaria").find("a.eliminar_ic").click(function(){$(this).parent().remove();});
			$("div#campos-extraordinaria").find(".persona_ic:last").smartFocus("Ciudadano que se invita a comparecer");
			$("div#campos-extraordinaria").find(".ente_ic:last").smartFocus("Ente, institución u organización representada por el ciudadano invitado a comparecer");
			$("div#campos-extraordinaria").find("a.eliminar_ic").click(function(){$(this).parent().remove();});
			$("div#campos-delegada1").find(".persona_ic:last").smartFocus("Ciudadano que se invita a comparecer");
			$("div#campos-delegada1").find(".ente_ic:last").smartFocus("Ente, institución u organización representada por el ciudadano invitado a comparecer");
			$("div#campos-delegada1").find("a.eliminar_ic").click(function(){$(this).parent().remove();});
			$("div#campos-delegada2").find(".persona_ic:last").smartFocus("Ciudadano que se invita a comparecer");
			$("div#campos-delegada2").find(".ente_ic:last").smartFocus("Ente, institución u organización representada por el ciudadano invitado a comparecer");
			$("div#campos-delegada2").find("a.eliminar_ic").click(function(){$(this).parent().remove();});
			$("div#campos-ordinaria select.nro_ic:last").attr({name: nombreA});
			$("input.persona_ic:last").attr({name: nombreB});
			$("input.ente_ic:last").attr({name: nombreC});
			nroPosicion ++;
		});
	}
	
	function crearRemisionComision(){
		var nroPosicion = 1;
		$.listen('click', 'a.disparador_rc', function(){
			var nombreA = "tipo-rc" + nroPosicion;
			var nombreB = "comision-rc" + nroPosicion;
			var nombreC = "nro-doc" + nroPosicion;
			var nombreD = "desc-doc" + nroPosicion;
			$("a.disparador_dp, a.disparador_ic").css({'display' : 'block', 'margin-bottom' : '40px'});
			$("a.disparador_rc").css({'display' : 'block'});
			$("<div><select class='nombre_comision' style='padding:5px;margin-right:15px;width:auto'><option selected='selected' value='NULL'>Selecciona una Comisi&oacute;n</option><option value='1'>Mesa y Pol&iacute;tica</option><option value='2'>Finanzas y Asuntos Laborales</option><option value='3'>Contralor&iacute;a, Servicios y Obras P&uacute;blicas</option><option value='4'>Educaci&oacute;n, Cultura, Deporte y Recreaci&oacute;n</option><option value='5'>Salud, Sociales, Drogas y Derechos Humanos</option><option value='6'>Agr&iacute;cola, Ambiente y Asuntos Vecinales</option><option value='7'>Legislaci&oacute;n, Estilo y Ordenamiento Territorial</option></select><select class='tipo_rc' style='padding:5px;margin-right:15px;width:auto;'><option selected='selected' value='NULL'>Selecciona el tipo de documento</option><option value='1'>Cr&eacute;dito Adicional Gob.</option><option value='2'>Traspaso Gob.</option><option value='3'>Rectificaci&oacute;n Presupuestaria Gob.</option><option value='4'>Disminuci&oacute;n Presupuestaria Gob.</option><option value='5'>Cr&eacute;dito Adicional CLEY</option><option value='6'>Traspaso CLEY</option><option value='7'>Oficios de Solicitud</option></select><input type='text' class='nro_doc' size='12' style='width:auto;display:inline;margin:15px 15px 15px 0px;' /><input type='text' class='desc_doc' size='55' style='width:auto;display:inline;margin:15px 15px 15px 0px;' /><p class='contador' style='color:#3C3;float:right;margin-top:-47px;margin-right:15px;font-size:200%;font-weight:bold;'>60</p><a href='#' class='eliminar_rc'>Eliminar Remisi&oacute;n a Comisi&oacute;n</a><hr class='division_rc' /></div>").insertBefore(this);
			$("div#campos-ordinaria").find(".nro_doc:last").smartFocus("Nro. Documento");
			$("div#campos-ordinaria").find(".desc_doc:last").smartFocus("Descripción Breve del Documento");
			$("div#campos-extraordinaria").find(".nro_doc:last").smartFocus("Nro. Documento");
			$("div#campos-extraordinaria").find(".desc_doc:last").smartFocus("Descripción Breve del Documento");
			$("div#campos-delegada1").find(".nro_doc:last").smartFocus("Nro. Documento");
			$("div#campos-delegada1").find(".desc_doc:last").smartFocus("Descripción Breve del Documento");
			$("div#campos-delegada2").find(".nro_doc:last").smartFocus("Nro. Documento");
			$("div#campos-delegada2").find(".desc_doc:last").smartFocus("Descripción Breve del Documento");
			$(".desc_doc").focus(function(){
				$(this).attr({id : "campoActivo"});
				$(this).keyup(function(){
					var caracteresActuales = $(this).val().length;
					var caracteresRestantes = 60 - caracteresActuales;
					$("div#campos-ordinaria").find("#campoActivo + .contador").empty().append(document.createTextNode(caracteresRestantes));
					$("div#campos-extraordinaria").find("#campoActivo + .contador").empty().append(document.createTextNode(caracteresRestantes));
					$("div#campos-delegada1").find("#campoActivo + .contador").empty().append(document.createTextNode(caracteresRestantes));
					$("div#campos-delegada2").find("#campoActivo + .contador").empty().append(document.createTextNode(caracteresRestantes));
					if(caracteresRestantes <= 0){
						$("#campoActivo + .contador").css({'color' : '#F00'});
					}
					else{
						$("#campoActivo + .contador").css({'color' : '#3C3'});
					};
				});
			});
			$(".desc_doc").blur(function(){
				$(this).removeAttr("id");
			});
			$("div#campos-ordinaria").find("a.eliminar_rc").click(function(){$(this).parent().remove();});
			$("div#campos-extraordinaria").find("a.eliminar_rc").click(function(){$(this).parent().remove();});
			$("div#campos-delegada1").find("a.eliminar_rc").click(function(){$(this).parent().remove();});
			$("div#campos-delegada2").find("a.eliminar_rc").click(function(){$(this).parent().remove();});
			$("select.tipo_rc:last").attr({name: nombreA});
			$("select.nombre_comision:last").attr({name: nombreB});
			$("input.nro_doc:last").attr({name: nombreC});
			$("input.desc_doc:last").attr({name: nombreD});
			nroPosicion ++;
		});
	}
// <------------------------------------------------------------------------------------------------------------------------------------->


// <------------------------------------------------------------------------------------------------------------------------------------->
// AQUÍ ESTÁ EL EFECTO PARA CONTAR LOS CARACTERES RESTANTES DE UN CAMPO
	function cuentaCaracteres(){
		var limite01 = 50;
		
		$("form#ingtit p.contador").append(document.createTextNode(limite01));
		$("input.introduce-titular").keyup(function(){
			var caracteresActuales = $(this).val().length;
			var caracteresRestantes = limite01 - caracteresActuales;
			$("form#ingtit p.contador").empty().append(document.createTextNode(caracteresRestantes));
			if(caracteresRestantes <= 0){
				$("form#ingtit p.contador").css({'color' : '#F00'});
			}
			else{
				$("form#ingtit p.contador").css({'color' : '#3C3'});
			};
		});
	}
// <------------------------------------------------------------------------------------------------------------------------------------->