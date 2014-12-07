<?php
header("Cache-Control: no-cache");
$ruta = $_SERVER['REQUEST_URI'];
$i=0;
$ancla = "";
while($fin <> 'si'){
		if ($ruta{$i} == '%'){
			if ($ruta{$i+1} == 2){
				if ($ruta{$i+2} == 3){
					$fin = 'si';
					$total=strlen($ruta)-$i-3;
					$ir="";
					$c=0;
					$alter=3;
					for ($s=0;$s<=$total;$s++){
						$posicion=$i+$alter+$s;
						$p=$ruta{$posicion};
						if ($ruta{$posicion} == '%'){
							$simbolo=$ruta{$posicion}.$ruta{$posicion+1}.$ruta{$posicion+2};
							switch($simbolo){
								case '%2F' : $ir=$ir.'/'; $alter+=2; break;
								case '%26' : $action='vname'; $alter+=2; $nvarible=""; break;
								case '%3D' : $action='vvalor'; $alter+=2; break;
								case '%23' : $ancla='#'; $alter+=2; break; 
							}
						}elseif($action == 'vname'){
							$nvarible=$nvarible.$ruta{$posicion};
						}elseif(($action == 'vvalor') && ($ancla == "")){
							$vvarible{$nvarible}=$vvarible{$nvarible}.$ruta{$posicion};
						}elseif($ancla <> ""){
							$ancla=$ancla.$ruta{$posicion};
						}else{
							$ir=$ir.$ruta{$posicion};
						}
					}
				}
			}
		}else{
			$i++;
		}
}
// echo "Ruta: ".$ir;
// echo " Ancla: ".$ancla;
// echo " Variable: ".$vvarible{$nvarible};
if(file_exists($ir) AND ($fin == 'si')){
include("$ir");
}else{
include("portada.php");
echo "La ruta especificada no existe";
}
?>