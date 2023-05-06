<?php
date_default_timezone_set('America/Bogota');
include('conexion.php');

//Este script hace un reporte de predios rurales cuyos datos los tengamos en la BD de 
//Pandemia, Emsanar y Permisos

$nombre_tabla = "febrero_2023";
$contador_encontrados = 0;

$sentencia_buscar = "SELECT * FROM $nombre_tabla WHERE `Uso` LIKE 'R'";
$resultado_buscar = mysqli_query($con,$sentencia_buscar);
while($filas = mysqli_fetch_assoc($resultado_buscar)){

    //Buscar Teléfono
    $sentencia_telefono = "select * from telefonos where fk_cedula = '".$filas["No Identificacion"]."'";
    //echo $sentencia_telefono;
    $resultado_telefono = mysqli_query($con,$sentencia_telefono);
    if(mysqli_num_rows($resultado_telefono) > 0){
        while($filas_telefono = mysqli_fetch_assoc($resultado_telefono)){
            echo "Encontrado ".$filas["Porpietario"]." telefono: ".$filas_telefono["telefono"]."\r\n";
            $contador_encontrados ++;
        }
    }

    
    //echo "Encontrado".$filas["Porpietario"]."\r\n";
    
    
}
echo "Cantidad Encontrados".$contador_encontrados;

?>