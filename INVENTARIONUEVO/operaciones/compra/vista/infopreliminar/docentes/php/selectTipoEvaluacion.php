<?php
function mostrarTipoEvaluacion() {
    $sql = "select * from especialidad order by nombreespecialidad asc";
    $query = pg_query($sql);
    while ($registros = pg_fetch_array($query)) {
        //echo '<option value="'.$registros['codespecialidad'].'">'.$registros['nombreespecialidad'].'</option>';
        $datos[] = $registros;
    }
    return $datos;
}
?>
