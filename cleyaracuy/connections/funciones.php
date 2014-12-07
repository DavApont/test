<?php
// (No Borrar)Todo los caracteres los consegui en http://htmlhelp.com/reference/charset/iso224-255.html y en http://www.csgnetwork.com/htmlchrset.html
if (!function_exists("bbparse")) {
	function bbparse($mensaje) {
		$bbcode = array();
		$xhtml = array();
		$bbcode[] = "Á"; $xhtml[] = "&Aacute;";
		$bbcode[] = "á"; $xhtml[] = "&aacute;";
		$bbcode[] = "É"; $xhtml[] = "&Eacute;";
		$bbcode[] = "é"; $xhtml[] = "&eacute;";
		$bbcode[] = "Í"; $xhtml[] = "&Iacute;";
		$bbcode[] = "í"; $xhtml[] = "&iacute;";
		$bbcode[] = "Ó"; $xhtml[] = "&Oacute;";
		$bbcode[] = "ó"; $xhtml[] = "&oacute;";
		$bbcode[] = "Ú"; $xhtml[] = "&Uacute;";
		$bbcode[] = "ú"; $xhtml[] = "&uacute;";
		$bbcode[] = "Ý"; $xhtml[] = "&Yacute;";
		$bbcode[] = "ñ"; $xhtml[] = "&ntilde;";
		$bbcode[] = "¡"; $xhtml[] = "&iexcl;";
		$bbcode[] = "«"; $xhtml[] = "&laquo;";
		$bbcode[] = "Æ"; $xhtml[] = "&AElig;";
		$bbcode[] = "Ð"; $xhtml[] = "&ETH;";
		$bbcode[] = "¢"; $xhtml[] = "&cent;";
		$bbcode[] = "¹"; $xhtml[] = "&sup1;";
		$bbcode[] = "±"; $xhtml[] = "&plusmn;";
		$bbcode[] = "Ø"; $xhtml[] = "&Oslash;";
		$bbcode[] = "<"; $xhtml[] = "&lt;";
		$bbcode[] = "º"; $xhtml[] = "&ordm;";
		$bbcode[] = "¦"; $xhtml[] = "&brvbar;";
		$bbcode[] = "À"; $xhtml[] = "&Agrave;";
		$bbcode[] = "à"; $xhtml[] = "&agrave;";
		$bbcode[] = "È"; $xhtml[] = "&Egrave;";
		$bbcode[] = "è"; $xhtml[] = "&egrave;";
		$bbcode[] = "Ì"; $xhtml[] = "&Igrave;";
		$bbcode[] = "ì"; $xhtml[] = "&igrave;";
		$bbcode[] = "Ò"; $xhtml[] = "&Ograve;";
		$bbcode[] = "ò"; $xhtml[] = "&ograve;";
		$bbcode[] = "Ù"; $xhtml[] = "&Ugrave;";
		$bbcode[] = "ù"; $xhtml[] = "&ugrave;";
		$bbcode[] = "ý"; $xhtml[] = "&yacute;";
		$bbcode[] = "Ñ"; $xhtml[] = "&Ntilde;";
		$bbcode[] = "¿"; $xhtml[] = "&iquest;";
		$bbcode[] = "»"; $xhtml[] = "&raquo;";
		$bbcode[] = "æ"; $xhtml[] = "&aelig;";
		$bbcode[] = "ð"; $xhtml[] = "&eth;";
		$bbcode[] = "£"; $xhtml[] = "&pound;";
		$bbcode[] = "²"; $xhtml[] = "&sup2;";
		$bbcode[] = "¼"; $xhtml[] = "&frac14;";
		$bbcode[] = "ø"; $xhtml[] = "&oslash;";
		$bbcode[] = ">"; $xhtml[] = "&gt;";
		$bbcode[] = "ª"; $xhtml[] = "&ordf;";
		$bbcode[] = "§"; $xhtml[] = "&sect;";
		$bbcode[] = "Â"; $xhtml[] = "&Acirc;";
		$bbcode[] = "â"; $xhtml[] = "&acirc;";
		$bbcode[] = "Ê"; $xhtml[] = "&Ecirc;";
		$bbcode[] = "ê"; $xhtml[] = "&ecirc;";
		$bbcode[] = "Î"; $xhtml[] = "&Icirc;";
		$bbcode[] = "î"; $xhtml[] = "&icirc;";
		$bbcode[] = "Ô"; $xhtml[] = "&Ocirc;";
		$bbcode[] = "ô"; $xhtml[] = "&ocirc;";
		$bbcode[] = "Û"; $xhtml[] = "&Ucirc;";
		$bbcode[] = "û"; $xhtml[] = "&ucirc;";
		$bbcode[] = "ÿ"; $xhtml[] = "&yuml;";
		$bbcode[] = "Ç"; $xhtml[] = "&Ccedil;";
		$bbcode[] = "´"; $xhtml[] = "&acute;";
		$bbcode[] = "¨"; $xhtml[] = "&uml;";
		$bbcode[] = "ß"; $xhtml[] = "&szlig;";
		$bbcode[] = "Þ"; $xhtml[] = "&THORN;";
		$bbcode[] = "¤"; $xhtml[] = "&curren;";
		$bbcode[] = "³"; $xhtml[] = "&sup3;";
		$bbcode[] = "½"; $xhtml[] = "&frac12;";
		$bbcode[] = "¬"; $xhtml[] = "&not;";
		//$bbcode[] = "&"; $xhtml[] = "&amp;";
		$bbcode[] = "©"; $xhtml[] = "&copy;";
		$bbcode[] = "¶"; $xhtml[] = "&para;";
		$bbcode[] = "Ä"; $xhtml[] = "&Auml;";
		$bbcode[] = "ä"; $xhtml[] = "&auml;";
		$bbcode[] = "Ë"; $xhtml[] = "&Euml;";
		$bbcode[] = "ë"; $xhtml[] = "&euml;";
		$bbcode[] = "Ï"; $xhtml[] = "&Iuml;";
		$bbcode[] = "ï"; $xhtml[] = "&iuml;";
		$bbcode[] = "Ö"; $xhtml[] = "&Ouml;";
		$bbcode[] = "ö"; $xhtml[] = "&ouml;";
		$bbcode[] = "Ü"; $xhtml[] = "&Uuml;";
		$bbcode[] = "ü"; $xhtml[] = "&uuml;";
		$bbcode[] = "ç"; $xhtml[] = "&ccedil;";
		$bbcode[] = "•"; $xhtml[] = "&middot;";
		$bbcode[] = "µ"; $xhtml[] = "&micro;";
		$bbcode[] = "þ"; $xhtml[] = "&thorn;";
		$bbcode[] = "¥"; $xhtml[] = "&yen;";
		$bbcode[] = "­"; $xhtml[] = "&shy;";
		$bbcode[] = "¾"; $xhtml[] = "&frac34;";
		$bbcode[] = ""; $xhtml[] = "&nbsp;";
		$bbcode[] = "®"; $xhtml[] = "&reg;";
		$bbcode[] = "¯"; $xhtml[] = "&macr;";
		$bbcode[] = "Ã"; $xhtml[] = "&Atilde;";
		$bbcode[] = "ã"; $xhtml[] = "&atilde;";
		$bbcode[] = "Õ"; $xhtml[] = "&Otilde;";
		$bbcode[] = "õ"; $xhtml[] = "&otilde;";
		$bbcode[] = "¸"; $xhtml[] = "&cedil;";
		$bbcode[] = "×"; $xhtml[] = "&times;";
		$bbcode[] = "“"; $xhtml[] = "&quot;";
		$bbcode[] = "°"; $xhtml[] = "&deg;";
		$bbcode[] = "Å"; $xhtml[] = "&Aring;";
		$bbcode[] = "å"; $xhtml[] = "&aring;";
		$bbcode[] = "÷"; $xhtml[] = "&divide;";
		return str_replace($bbcode,$xhtml,$mensaje); 
	}
}
if (!function_exists("mes")) {
	function mes($mes) {
		switch ($mes) {
			case 1:
				echo 'ENE';
			break;
			case 2:
				echo 'FEB';
			break;
			case 3:
				echo 'MAR';
			break;
			case 4:
				echo 'ABR';
			break;
			case 5:
				echo 'MAY';
			break;
			case 6:
				echo 'JUN';
			break;
			case 7:
				echo 'JUL';
			break;
			case 8:
				echo 'AGO';
			break;
			case 9:
				echo 'SEP';
			break;
			case 10:
				echo 'OCT';
			break;
			case 11:
				echo 'NOV';
			break;
			case 12:
				echo 'DIC';
			break;
	
		}
	}
}
if (!function_exists("diasemana")) {
	function diasemana($diasemana) {
		switch ($diasemana) {
			case 0:
				echo 'DOM';
			break;
			case 1:
				echo 'LUN';
			break;
			case 2:
				echo 'MAR';
			break;
			case 3:
				echo 'MIE';
			break;
			case 4:
				echo 'JUE';
			break;
			case 5:
				echo 'VIE';
			break;
			case 6:
				echo 'SAB';
			break;
		}
	}
}
if (!function_exists("titulon")) {
	function titulon($tipo) {
		switch ($tipo) {
			case 1:
				echo 'Regionales';
			break;
			case 2:
				echo 'Nacionales';
			break;
			case 3:
				echo 'Internacionales';
			break;
			default:
				echo 'Selecciona una Seccion Correcta';
		}
	}
}
if (!function_exists("borra_etiquetas")) {
	function borra_etiquetas($mensaje) {
		$bbcode = array();
		$xhtml = array();
		$bbcode[] = "<p>"; $xhtml[] = "";
		$bbcode[] = "</p>"; $xhtml[] = "";
		return str_replace($bbcode,$xhtml,$mensaje); 
	}
}
if (!function_exists("bbparse_inv")) {
	function bbparse_inv($mensaje) {
		$bbcode = array();
		$xhtml = array();
		$bbcode[] = "&Aacute;"; $xhtml[] = "Á";
		$bbcode[] = "&aacute;"; $xhtml[] = "á";
		$bbcode[] = "&Eacute;"; $xhtml[] = "É";
		$bbcode[] = "&eacute;"; $xhtml[] = "é";
		$bbcode[] = "&Iacute;"; $xhtml[] = "Í";
		$bbcode[] = "&iacute;"; $xhtml[] = "í";
		$bbcode[] = "&Oacute;"; $xhtml[] = "Ó";
		$bbcode[] = "&oacute;"; $xhtml[] = "ó";
		$bbcode[] = "&Uacute;"; $xhtml[] = "Ú";
		$bbcode[] = "&uacute;"; $xhtml[] = "ú";
		$bbcode[] = "&Yacute;"; $xhtml[] = "Ý";
		$bbcode[] = "&ntilde;"; $xhtml[] = "ñ";
		$bbcode[] = "&iexcl;"; $xhtml[] = "¡";
		$bbcode[] = "&laquo;"; $xhtml[] = "«";
		$bbcode[] = "&AElig;"; $xhtml[] = "Æ";
		$bbcode[] = "&ETH;"; $xhtml[] = "Ð";
		$bbcode[] = "&cent;"; $xhtml[] = "¢";
		$bbcode[] = "&sup1;"; $xhtml[] = "¹";
		$bbcode[] = "&plusmn;"; $xhtml[] = "±";
		$bbcode[] = "&Oslash;"; $xhtml[] = "Ø";
		$bbcode[] = "&lt;"; $xhtml[] = "<";
		$bbcode[] = "&ordm;"; $xhtml[] = "º";
		$bbcode[] = "&brvbar;"; $xhtml[] = "¦";
		$bbcode[] = "&Agrave;"; $xhtml[] = "À";
		$bbcode[] = "&agrave;"; $xhtml[] = "à";
		$bbcode[] = "&Egrave;"; $xhtml[] = "È";
		$bbcode[] = "&egrave;"; $xhtml[] = "è";
		$bbcode[] = "&Igrave;"; $xhtml[] = "Ì";
		$bbcode[] = "&igrave;"; $xhtml[] = "ì";
		$bbcode[] = "&Ograve;"; $xhtml[] = "Ò";
		$bbcode[] = "&ograve;"; $xhtml[] = "ò";
		$bbcode[] = "&Ugrave;"; $xhtml[] = "Ù";
		$bbcode[] = "&ugrave;"; $xhtml[] = "ù";
		$bbcode[] = "&yacute;"; $xhtml[] = "ý";
		$bbcode[] = "&Ntilde;"; $xhtml[] = "Ñ";
		$bbcode[] = "&iquest;"; $xhtml[] = "¿";
		$bbcode[] = "&raquo;"; $xhtml[] = "»";
		$bbcode[] = "&aelig;"; $xhtml[] = "æ";
		$bbcode[] = "&eth;"; $xhtml[] = "ð";
		$bbcode[] = "&pound;"; $xhtml[] = "£";
		$bbcode[] = "&sup2;"; $xhtml[] = "²";
		$bbcode[] = "&frac14;"; $xhtml[] = "¼";
		$bbcode[] = "&oslash;"; $xhtml[] = "ø";
		$bbcode[] = "&gt;"; $xhtml[] = ">";
		$bbcode[] = "&ordf;"; $xhtml[] = "ª";
		$bbcode[] = "&sect;"; $xhtml[] = "§";
		$bbcode[] = "&Acirc;"; $xhtml[] = "Â";
		$bbcode[] = "&acirc;"; $xhtml[] = "â";
		$bbcode[] = "&Ecirc;"; $xhtml[] = "Ê";
		$bbcode[] = "&ecirc;"; $xhtml[] = "ê";
		$bbcode[] = "&Icirc;"; $xhtml[] = "Î";
		$bbcode[] = "&icirc;"; $xhtml[] = "î";
		$bbcode[] = "&Ocirc;"; $xhtml[] = "Ô";
		$bbcode[] = "&ocirc;"; $xhtml[] = "ô";
		$bbcode[] = "&Ucirc;"; $xhtml[] = "Û";
		$bbcode[] = "&ucirc;"; $xhtml[] = "û";
		$bbcode[] = "&yuml;"; $xhtml[] = "ÿ";
		$bbcode[] = "&Ccedil;"; $xhtml[] = "Ç";
		$bbcode[] = "&acute;"; $xhtml[] = "´";
		$bbcode[] = "&uml;"; $xhtml[] = "¨";
		$bbcode[] = "&szlig;"; $xhtml[] = "ß";
		$bbcode[] = "&THORN;"; $xhtml[] = "Þ";
		$bbcode[] = "&curren;"; $xhtml[] = "¤";
		$bbcode[] = "&sup3;"; $xhtml[] = "³";
		$bbcode[] = "&frac12;"; $xhtml[] = "½";
		$bbcode[] = "&not;"; $xhtml[] = "¬";
		//$bbcode[] = "&amp;"; $xhtml[] = "&";
		$bbcode[] = "&copy;"; $xhtml[] = "©";
		$bbcode[] = "&para;"; $xhtml[] = "¶";
		$bbcode[] = "&Auml;"; $xhtml[] = "Ä";
		$bbcode[] = "&auml;"; $xhtml[] = "ä";
		$bbcode[] = "&Euml;"; $xhtml[] = "Ë";
		$bbcode[] = "&euml;"; $xhtml[] = "ë";
		$bbcode[] = "&Iuml;"; $xhtml[] = "Ï";
		$bbcode[] = "&iuml;"; $xhtml[] = "ï";
		$bbcode[] = "&Ouml;"; $xhtml[] = "Ö";
		$bbcode[] = "&ouml;"; $xhtml[] = "ö";
		$bbcode[] = "&Uuml;"; $xhtml[] = "Ü";
		$bbcode[] = "&uuml;"; $xhtml[] = "ü";
		$bbcode[] = "&ccedil;"; $xhtml[] = "ç";
		$bbcode[] = "&middot;"; $xhtml[] = "•";
		$bbcode[] = "&micro;"; $xhtml[] = "µ";
		$bbcode[] = "&thorn;"; $xhtml[] = "þ";
		$bbcode[] = "&yen;"; $xhtml[] = "¥";
		$bbcode[] = "&shy;"; $xhtml[] = "­";
		$bbcode[] = "&frac34;"; $xhtml[] = "¾";
		$bbcode[] = "&nbsp;"; $xhtml[] = "";
		$bbcode[] = "&reg;"; $xhtml[] = "®";
		$bbcode[] = "&macr;"; $xhtml[] = "¯";
		$bbcode[] = "&Atilde;"; $xhtml[] = "Ã";
		$bbcode[] = "&atilde;"; $xhtml[] = "ã";
		$bbcode[] = "&Otilde;"; $xhtml[] = "Õ";
		$bbcode[] = "&otilde;"; $xhtml[] = "õ";
		$bbcode[] = "&cedil;"; $xhtml[] = "¸";
		$bbcode[] = "&times;"; $xhtml[] = "×";
		$bbcode[] = "&quot;"; $xhtml[] = "“";
		$bbcode[] = "&deg;"; $xhtml[] = "°";
		$bbcode[] = "&Aring;"; $xhtml[] = "Å";
		$bbcode[] = "&aring;"; $xhtml[] = "å";
		$bbcode[] = "&divide;"; $xhtml[] = "÷";
		$bbcode[] = "&lsquo;"; $xhtml[] = "‘";
		$bbcode[] = "&rsquo;"; $xhtml[] = "’";
		$bbcode[] = "&ldquo;"; $xhtml[] = "“";
		$bbcode[] = "&rdquo;"; $xhtml[] = "”";
		return str_replace($bbcode,$xhtml,$mensaje); 
	}
}
if (!function_exists("htmlchrset")) {
	function htmlchrset($mensaje) {
		$bbcode = array();
		$xhtml = array();
		$bbcode[] = "À"; $xhtml[] = "&#192;";
		$bbcode[] = "à"; $xhtml[] = "&#224;";
		$bbcode[] = "Á"; $xhtml[] = "&#193;";
		$bbcode[] = "á"; $xhtml[] = "&#225;";
		$bbcode[] = "Â"; $xhtml[] = "&#194;";
		$bbcode[] = "â"; $xhtml[] = "&#226;";
		$bbcode[] = "Ã"; $xhtml[] = "&#195;";
		$bbcode[] = "ã"; $xhtml[] = "&#227;";
		$bbcode[] = "Ä"; $xhtml[] = "&#196;";
		$bbcode[] = "ä"; $xhtml[] = "&#228;";
		$bbcode[] = "Å"; $xhtml[] = "&#197;";
		$bbcode[] = "å"; $xhtml[] = "&#229;";
		$bbcode[] = "Æ"; $xhtml[] = "&#198;";
		$bbcode[] = "æ"; $xhtml[] = "&#230;";
		$bbcode[] = "Ç"; $xhtml[] = "&#199;";
		$bbcode[] = "ç"; $xhtml[] = "&#231;";
		$bbcode[] = "È"; $xhtml[] = "&#200;";
		$bbcode[] = "è"; $xhtml[] = "&#232;";
		$bbcode[] = "É"; $xhtml[] = "&#201;";
		$bbcode[] = "é"; $xhtml[] = "&#233;";
		$bbcode[] = "Ê"; $xhtml[] = "&#202;";
		$bbcode[] = "ê"; $xhtml[] = "&#234;";
		$bbcode[] = "Ë"; $xhtml[] = "&#203;";
		$bbcode[] = "ë"; $xhtml[] = "&#235;";
		$bbcode[] = "Ì"; $xhtml[] = "&#204;";
		$bbcode[] = "ì"; $xhtml[] = "&#236;";
		$bbcode[] = "Í"; $xhtml[] = "&#205;";
		$bbcode[] = "í"; $xhtml[] = "&#237;";
		$bbcode[] = "Î"; $xhtml[] = "&#206;";
		$bbcode[] = "î"; $xhtml[] = "&#238;";
		$bbcode[] = "Ï"; $xhtml[] = "&#207;";
		$bbcode[] = "ï"; $xhtml[] = "&#239;";
		$bbcode[] = "µ"; $xhtml[] = "&#181;";
		$bbcode[] = "Ñ"; $xhtml[] = "&#209;";
		$bbcode[] = "ñ"; $xhtml[] = "&#241;";
		$bbcode[] = "Ò"; $xhtml[] = "&#210;";
		$bbcode[] = "ò"; $xhtml[] = "&#242;";
		$bbcode[] = "Ó"; $xhtml[] = "&#211;";
		$bbcode[] = "ó"; $xhtml[] = "&#243;";
		$bbcode[] = "Ô"; $xhtml[] = "&#212;";
		$bbcode[] = "ô"; $xhtml[] = "&#244;";
		$bbcode[] = "Õ"; $xhtml[] = "&#213;";
		$bbcode[] = "õ"; $xhtml[] = "&#245;";
		$bbcode[] = "Ö"; $xhtml[] = "&#214;";
		$bbcode[] = "ö"; $xhtml[] = "&#246;";
		$bbcode[] = "Ø"; $xhtml[] = "&#216;";
		$bbcode[] = "ø"; $xhtml[] = "&#248;";
		$bbcode[] = "ß"; $xhtml[] = "&#223;";
		$bbcode[] = "Ù"; $xhtml[] = "&#217;";
		$bbcode[] = "ù"; $xhtml[] = "&#249;";
		$bbcode[] = "Ú"; $xhtml[] = "&#218;";
		$bbcode[] = "ú"; $xhtml[] = "&#250;";
		$bbcode[] = "Û"; $xhtml[] = "&#219;";
		$bbcode[] = "û"; $xhtml[] = "&#251;";
		$bbcode[] = "Ü"; $xhtml[] = "&#220;";
		$bbcode[] = "ü"; $xhtml[] = "&#252;";
		$bbcode[] = "ÿ"; $xhtml[] = "&#255;";
		$bbcode[] = "“"; $xhtml[] = "&#8220;";
		$bbcode[] = "”"; $xhtml[] = "&#8221;";
		$bbcode[] = "‘"; $xhtml[] = "&#8216;";
		$bbcode[] = "’"; $xhtml[] = "&#8217;";
		return str_replace($bbcode,$xhtml,$mensaje); 
	}
}
if (!function_exists("FuncionFecha")) {
	function FuncionFecha($fecha) {
		$ano=substr($fecha,0,4);
		$mes=substr($fecha,5,2);
		$dia=substr($fecha,8,2);
		$diasem=substr($fecha,11,1);
		$hora=substr($fecha,13,2);
		$minuto=substr($fecha,16,2);
		$segundo=substr($fecha,19,2);
		$horario=substr($fecha,22,2);
		echo diasemana($diasem);echo " ".$dia;echo "/";mes($mes);echo "/".$ano." ".$hora.":".$minuto.":".$segundo.$horario;
	}
}
?>