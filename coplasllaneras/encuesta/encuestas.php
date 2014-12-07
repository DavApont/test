<?php 
    
    $ipencuesta = $_SERVER['REMOTE_ADDR']; 
    $sql = mysql_query("SELECT * FROM encuestas_ip WHERE ip_voto LIKE '".$ipencuesta."'") or die(mysql_error()); 
    $votadas = mysql_fetch_array($sql); 
    if(mysql_num_rows($sql) == 0) { 
        $sql_enc = mysql_query("SELECT * FROM encuestas ORDER BY id_enc DESC LIMIT 0,1") or die(mysql_error()); 
        while($row = mysql_fetch_array($sql_enc)) { 
            $id_enc = $row['id_enc']; 
            $pregunta = $row['pregunta']; 
?> 
<table width="95%" border="0" cellspacing="0" cellpadding="1" align="center" class="poll">
	<thead>
		<tr>
			<td style="font-weight: bold;"><?php echo $pregunta ?></td>
		</tr>
	</thead>
		<tr>
			<td align="center">
				<table class="pollstableborder" cellspacing="0" cellpadding="0" border="0">

            <form method="post" action="encuesta/votarencuesta.php"> 
            <?php 
                $opt = mysql_query("SELECT * FROM encuestas_opt WHERE id_enc='".$id_enc."'") or die(mysql_error()); 
                while($row2 = mysql_fetch_array($opt)) { 
                    $id_opt = $row2['id_opt']; 
                    $opciones = $row2['opciones']; 
                    $num_votos = $row2['num_votos']; 
	if ($classn==0){
      		$class= "sectiontableentry2";
       		$classn=1;
    	}else{
       		$class="sectiontableentry1";
       		$classn=0;
    	} 
            ?> 

                <tr>
			<td class="<?php echo $class;?>" valign="top" width="25">
				<input type="radio" name="opciones" value="<?php echo $id_opt ?>" /></td>
			<td class="<?php echo $class;?>" valign="top" width="100%"><?php echo $opciones ?></td></tr>
            <?php 
		
                } 
            ?> 
            	</table></td>
														</tr>
														<tr>
															<td>
															<div align="center">
               <div align="center"><input type="submit" name="votar" value="Votar" /> 
             
            </div></td></form>
<?php 
        } 
    }else { 
        $encuesta = mysql_query("SELECT * FROM encuestas ORDER BY id_enc DESC LIMIT 0,1") or die(mysql_error()); 
        while($datos = mysql_fetch_array($encuesta)) { 
            $id_enc = $datos['id_enc']; 
            $pregunta = $datos['pregunta']; 
?> 
            <table width="95%" border="0" cellspacing="0" cellpadding="1" align="center" class="poll">
	<thead>
		<tr>
			<td style="font-weight: bold;"><?php echo $pregunta ?></td>
		</tr>
	</thead>
		<tr>
			<td align="center">
				<table class="pollstableborder" cellspacing="0" cellpadding="0" border="0">
<?php 
            $rs = mysql_query("SELECT sum(num_votos) FROM encuestas_opt WHERE id_enc='".$id_enc."'"); 
            $tot = mysql_result($rs,0); 
            $opts = mysql_query("SELECT * FROM encuestas_opt WHERE id_enc='".$id_enc."'") or die(mysql_error()); 
            while($dat2 = mysql_fetch_array($opts)) { 
                $id_opt = $dat2['id_opt']; 
                $opciones = $dat2['opciones']; 
                $num_votos = $dat2['num_votos']; 
                $ptos = $num_votos * 100; 
                $porcentaje = @round($ptos/$tot,0); 
		if ($classn==0){
      		$class= "sectiontableentry2";
       		$classn=1;
    	}else{
       		$class="sectiontableentry1";
       		$classn=0;
    	} 
?> 

                     <strong><?php echo $opciones?></strong> - <?php echo $num_votos?> votos - <?php echo $porcentaje?>% 
                        <div style="width: <?php echo $porcentaje?>%; height: 10px; background: #09F;"></div> 
<?php 
            } 
?> 
                  	</table></td>
														</tr>
														<tr>
															<td>
															<div align="center">
               <div align="center">Votos totales: <?php echo $tot?>
             
            </div></td>
<?php 
        } 
    } 
?> 