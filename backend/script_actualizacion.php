<?php
date_default_timezone_set('America/Bogota');
include('conexion.php');

$nombre_tabla = 'febrero_2023';

$sentencia_predial = "SELECT * FROM $nombre_tabla";
$resultado_predial = mysqli_query($con, $sentencia_predial);

$registros = mysqli_num_rows($resultado_predial);
$contador_registros = 0;

while ($valor = mysqli_fetch_assoc($resultado_predial)) {

    $cedula_consultar = $valor["No Identificacion"];

    echo "Procesando registro ".$contador_registros. " de ".$registros. " \r\n";
    $contador_registros ++;

    //Busqueda en la BD de pandemia
    $sentencia1 = "select cedula,nombres, apellidos, telefono, casa.direccion from ciudadano inner join casa on ciudadano.fk_id_casa = casa.id_casa where ciudadano.cedula like '$cedula_consultar'";
    //echo $sentencia1."\r\n";
    $resultado1 = mysqli_query($con, $sentencia1);

    if (mysqli_num_rows($resultado1) > 0) {
        while ($valor1 = mysqli_fetch_assoc($resultado1)) {
            $fecha = date("Y-m-d h:i:s");

            //Actualiza Teléfono de BD de Pandemia
            $telefono = $valor1["telefono"];
            $sentencia_insert = "insert into telefonos (fk_cedula,  telefono, descripcion, fecha) values ('$cedula_consultar','$telefono', 'Actualizado Automáticamente BD Pandemia', '$fecha')";
            $resultado_insert = mysqli_query($con, $sentencia_insert);
            if (!$resultado_insert) {
                echo "Error insertando en Telefonos Pandemia \r\n";
            } else {
                echo "Teléfono actualizado de Pandemia para CC " . $cedula_consultar . " Propietario: " . $valor["Porpietario"] . "\r\n";
            }

            //Actualiza Dirección de BD de Pandemia
            $direccion = $valor1["direccion"];
            $sentencia_insert = "insert into direcciones (fk_cedula,  direccion, descripcion, fecha) values ('$cedula_consultar','$direccion', 'Actualizado Automáticamente BD Pandemia', '$fecha')";
            $resultado_insert = mysqli_query($con, $sentencia_insert);
            if (!$resultado_insert) {
                echo "Error insertando en Telefonos Pandemia \r\n";
            } else {
                echo "Dirección actualizada de Pandemia para CC " . $cedula_consultar . " Propietario: " . $valor["Porpietario"] . "\r\n";
            }
        }
    }
    else {
        echo "No se encontró nada para la cédula ".$cedula_consultar. " En la BD de Pandemia";
    }

    //Busqueda en la BD de Emssanar
    $sentencia2 = "select NUMERO, AP1, AP2, NOM1, NOM2, DIRECCION, CELULAR from emsanar2020 where NUMERO like '$cedula_consultar'";
    //echo $sentencia2."\r\n";
    $resultado2 = mysqli_query($con, $sentencia2);
    if (mysqli_num_rows($resultado2) > 0) {
        while ($valor2 = mysqli_fetch_assoc($resultado2)) {
            $fecha = date("Y-m-d h:i:s");

            //Actualiza Teléfono de BD de Emsanar
            $telefono = $valor2["CELULAR"];
            $sentencia_insert = "insert into telefonos (fk_cedula,  telefono, descripcion, fecha) values ('$cedula_consultar','$telefono', 'Actualizado Automáticamente BD Emssanar', '$fecha')";
            $resultado_insert = mysqli_query($con, $sentencia_insert);
            if (!$resultado_insert) {
                echo "Error insertando en Telefonos Emssanar \r\n";
            } else {
                echo "Teléfono actualizado de Emssanar para CC " . $cedula_consultar . " Propietario: " . $valor["Porpietario"] . "\r\n";
            }

            //Actualiza Dirección de BD de Pandemia
            $direccion = $valor2["DIRECCION"];
            $sentencia_insert = "insert into direcciones (fk_cedula,  direccion, descripcion, fecha) values ('$cedula_consultar','$direccion', 'Actualizado Automáticamente BD Emssanar', '$fecha')";
            $resultado_insert = mysqli_query($con, $sentencia_insert);
            if (!$resultado_insert) {
                echo "Error insertando en Telefonos Emssanar \r\n";
            } else {
                echo "Dirección actualizada de Emssanar para CC " . $cedula_consultar . " Propietario: " . $valor["Porpietario"] . "\r\n";
            }
        }
    }
    else {
        echo "No se encontró nada para la cédula ".$cedula_consultar. " En la BD de Emsanar";
    }

    //Busqueda en la BD de permisos
    $sentencia3 = "select cedula, nombres, apellidos, telefono, direccion_residencia from permisos where cedula like '$cedula_consultar'";
    $resultado3 = mysqli_query($con, $sentencia3);

    if (mysqli_num_rows($resultado3) > 0) {
        while ($valor3 = mysqli_fetch_assoc($resultado3)) {
            $fecha = date("Y-m-d h:i:s");

            //Actualiza Teléfono de BD de Emsanar
            $telefono = $valor3["telefono"];
            $sentencia_insert = "insert into telefonos (fk_cedula,  telefono, descripcion, fecha) values ('$cedula_consultar','$telefono', 'Actualizado Automáticamente BD Permisos', '$fecha')";
            $resultado_insert = mysqli_query($con, $sentencia_insert);
            if (!$resultado_insert) {
                echo "Error insertando en Telefonos Permisos \r\n";
            } else {
                echo "Teléfono actualizado de Permisos para CC " . $cedula_consultar . " Propietario: " . $valor["Porpietario"] . "\r\n";
            }

            //Actualiza Dirección de BD de Pandemia
            $direccion = $valor3["direccion_residencia"];
            $sentencia_insert = "insert into direcciones (fk_cedula,  direccion, descripcion, fecha) values ('$cedula_consultar','$direccion', 'Actualizado Automáticamente BD Permisos', '$fecha')";
            $resultado_insert = mysqli_query($con, $sentencia_insert);
            if (!$resultado_insert) {
                echo "Error insertando en Telefonos Permisos \r\n";
            } else {
                echo "Dirección actualizada de Permisos para CC " . $cedula_consultar . " Propietario: " . $valor["Porpietario"] . "\r\n";
            }
        }
    }
    else {
        echo "No se encontró nada para la cédula ".$cedula_consultar. " En la BD de Permisos";
    }

}
