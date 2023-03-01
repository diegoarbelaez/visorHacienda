<?php


function hayTelefonos($cedula)
{
    //Sirve para buscar si el contacto tiene teléfonos, para identificarlo visualmente en el listado
    include("./backend/conexion.php");
    $cedula_consultar = $cedula;
    $sentencia_busqueda = "select distinct(telefono) from telefonos where fk_cedula = '" . $cedula_consultar . "'";
    $resultado_busqueda = mysqli_query($con, $sentencia_busqueda);
    if (mysqli_num_rows($resultado_busqueda) == 0) {
        return false;
    } else {
        return true;
    }
}
