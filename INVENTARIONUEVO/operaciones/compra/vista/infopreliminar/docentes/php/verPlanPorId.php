<?php
function listadoPlan($codigoCarga) {
    $codigoPlan = $_SESSION['coddocente'];
    $datos = array();
    $sql = "SELECT * FROM cargaacademica AS a, " .
           "asignatura AS t, ".  "lapsoacademico AS l ".
           "WHERE a.coddocente = $codigoPlan  and ".
           "a.codasignatura = t.codasignatura and a.codlapsoacademico = l.codlapsoacademico and a.codimparte = $codigoCarga";
    $resultado = pg_query($sql);
    while ($registros = pg_fetch_array($resultado)) {
        $datos[] = $registros;
    }
    return $datos;
}
?>
