// JavaScript Document
// Generado Por David Aponte.
// Todo los derechos reservados
// bajo Licencia GPL
	
	function login()
	{
		if (trimAll(document.entrar.user.value).length < 1) 
		{
			alert('Especifique un nombre de usuario valido.');
			document.entrar.user.focus();
			return false;
		}
		else if (trimAll(document.entrar.pword.value).length < 1)
		{
			alert('Especifique la contraseña.');
			document.entrar.pword.focus();
			return false;
		}
	else 
	{
		document.mainform.submit();
		return false;
	}
}


	function buscat()
	{
		if(trimAll(document.editcat.id.value).length < 1)
		{
			alert('Especifique la Categoria.');
			document.editcat.id.focus();
			return false;

		}
	}

	function busprod()
	{
		if(trimAll(document.edit_prod.cod_prod.value).length < 1)
		{
			alert('Especifique el Codigo del Producto.');
			document.edit_prod.cod_prod.focus();
			return false;
		}

	}
	
	function bususer()
	{
		if(trimAll(document.edit_user.login.value).length < 1)
		{
			alert('Especifique la Usuario.');
			document.edit_user.login.focus();
			return false;

		}
	}
	
	function busfecha()
	{
		if(trimAll(document.busfech.fecha_inicio.value).length < 1)
		{
			alert('Especifique una fecha inicial valida.');
			document.busfech.fecha_inicio.focus();
			return false;
		}
		else if (trimAll(document.busfech.fecha_final.value).length < 1)
		{
			alert('Especifique una fecha final valida.');
			document.busfech.fecha_final.focus();
			return false;
		}
		else if (trimAll(document.busfech.fecha_inicio.value) > trimAll(document.busfech.fecha_final.value) )
		{
			alert('La Fecha Inicial debe ser menor a la Fecha Final.');
			document.busfech.fecha_final.focus();
			return false;
		}
			}
	function creacate()
	{
		if(trimAll(document.creacat.nom_cat.value).length < 1)
		{
			alert('Especifique el nombre de la categoria.');
			document.creacat.nom_cat.focus();
			return false;

		}
	}
	

     function openHelpWin(URL)
     {
       myWindow=window.open(URL,'myWin','width=800,height=600,status=no,menubar=no,scrollable=yes,scrollbars=yes,resizable=yes');
     }	

     function trimAll(sString)
     {
        while (sString.substring(0,1) == ' ')
        {
           sString = sString.substring(1, sString.length);
        }
        while (sString.substring(sString.length-1, sString.length) == ' ')
        {
           sString = sString.substring(0,sString.length-1);
        }
        return sString;
     }
	 
	