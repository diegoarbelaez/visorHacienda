<?php
date_default_timezone_set('America/Bogota');
include("conexion.php");
$accion = $_POST["accion"];
switch ($accion) {
    case 1:
        $descripcion = $_POST["descripcion"];
        $tipo_evento = $_POST["tipo_evento"];
        $cedula = $_POST["cedula"];
        $fecha = date("Y-m-d h:i:s");
        $sentencia = "INSERT INTO `eventos` (`fecha`, `descripcion`, `fk_tipo_evento`, `fk_cedula`) VALUES ('$fecha', '$descripcion', '$tipo_evento', '$cedula')";
        echo $sentencia;
        $resultado = mysqli_query($con, $sentencia);
        if (!$resultado) {
            echo "Error en $sentencia - " . mysqli_error($con);
        } else {
            header("location:../confirmacion.php");
        }
        break;
    case 10:
        //Busca la cédula que se tiene en la BD de predial
        $id = $_POST["id"];
        $sentencia_buscar = "select `No Identificacion` from $nombre_tabla where id=$id";
        $resultado_buscar = mysqli_query($con, $sentencia_buscar);
        $fila = mysqli_fetch_assoc($resultado_buscar);

        $cedula_real = $_POST["cedula"];

        $sentencia_update = "update base_unica_propietarios set cedula_real = '$cedula_real' where `No Identificacion` like '" . $fila["No Identificacion"] . "'";
        echo $sentencia_update;
        $resultado_update = mysqli_query($con, $sentencia_update);
        if (!$resultado_update) {
            echo "Error en $sentencia_update - " . mysqli_error($con);
        } else {
            header("location:../confirmacion.php");
        }


        break;
}
