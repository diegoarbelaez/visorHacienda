<?php
include('conexion.php');
include_once 'cors.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(file_get_contents("php://input"), true);

    $cedula_consultar = $data["cedula"];

    $filas1 = array();
    $filas2 = array();
    $filas3 = array();
    $num_res1 = 0;
    $num_res2 = 0;
    $num_res3 = 0;
    $num_predial =0;


    //Valida si la persona a consultar efectivamente está primero en la BD de predial, esto para evitar buscar personas que no son...

    $sentencia_predial = "SELECT * FROM `febrero_2023` where `No Identificacion` = $cedula_consultar";

    $resultado_predial = mysqli_query($con, $sentencia_predial);
    if (mysqli_num_rows($resultado_predial) > 0) {
        
        $num_predial = mysqli_num_rows($resultado_predial);
        while ($valor = mysqli_fetch_assoc($resultado_predial)) {
            $filas_predial[] = $valor;
        }

        //Busqueda en la BD de pandemia
        $sentencia1 = "select cedula,nombres, apellidos, telefono from ciudadano where cedula = '$cedula_consultar'";
        $resultado1 = mysqli_query($con, $sentencia1);

        if (mysqli_num_rows($resultado1) > 0) {
            $num_res1 = mysqli_num_rows($resultado1);
            while ($valor = mysqli_fetch_assoc($resultado1)) {
                $filas1[] = $valor;
            }
        }

        //Busqueda en la BD de Emssanar
        $sentencia2 = "select NUMERO, AP1, AP2, NOM1, NOM2, DIRECCION, CELULAR from emsanar2020 where NUMERO = $cedula_consultar";
        $resultado2 = mysqli_query($con, $sentencia2);
        if (mysqli_num_rows($resultado2) > 0) {
            $num_res2 = mysqli_num_rows($resultado2);
            while ($valor = mysqli_fetch_assoc($resultado2)) {
                $filas2[] = $valor;
            }
        }

        //Busqueda en la BD de permisos
        $sentencia3 = "select cedula, nombres, apellidos, telefono, direccion_residencia from permisos where cedula = $cedula_consultar";
        $resultado3 = mysqli_query($con, $sentencia3);

        if (mysqli_num_rows($resultado3) > 0) {
            $num_res3 = mysqli_num_rows($resultado3);
            while ($valor = mysqli_fetch_assoc($resultado3)) {
                $filas3[] = $valor;
            }
        }

        //Creamos objeto de respuesta JSON
        $objeto = new stdClass();
        $objeto->pandemia = $num_res1;
        $objeto->emsanar = $num_res2;
        $objeto->permisos = $num_res3;
        $objeto->predial = $num_predial;

        echo json_encode(array('resultados' => $objeto, 'predial'=>$filas_predial , 'pandemia' => $filas1, 'emsanar' => $filas2, 'permisos' => $filas3));
        http_response_code(200);
    } else {
        echo json_encode(array("mensaje" => "No encontró la cédula", "cedula" => $cedula_consultar));
        http_response_code(200);
    }
}
