<?php
function mostrarAsignatura() {
    $sql = "select * from asignatura order by nombreasignatura asc";
    $query = pg_query($sql);
    while ($registros = pg_fetch_array($query)) {
        //echo '<option value="'.$registros['codasignatura'].'">'.$registros['nombreasignatura'].'</option>';
        $datos[] = $registros;
    }
    return $datos;
}
?>
