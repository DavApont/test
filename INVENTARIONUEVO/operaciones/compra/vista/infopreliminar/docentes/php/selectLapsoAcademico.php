<?php
function mostrarLapsoAcademico() {
    $sql = "select * from lapsoacademico where estado='VIGENTE' order by nombrelapsoacademico";
    $query = pg_query($sql);
    while ($registros = pg_fetch_array($query)) {
        //echo '<option value="'.$registros['codlapsoacademico'].'">'.$registros['nombrelapsoacademico'].'</option>';
        $datos[] = $registros;
    }
    return $datos;
}
?>
