<?php

  $destino = "numero.dat";
  $abrir = fopen($destino,"r");
  $cuenta = trim(fread($abrir,filesize($destino)));
  

  if ($cuenta != "") $cuenta++;
  else $cuenta = 1;
  @fclose($abrir);
  $abrir = fopen($destino,"w");
  @fputs($abrir,$cuenta);



  for($i=0;$i<strlen($cuenta);$i++) {
    $imagen = substr($cuenta,$i,1);
    $contador .= "<img alt='$imagen ' src='/contador/$imagen.gif'>";
  }
  @fclose($abrir);
  print $contador;
?>
