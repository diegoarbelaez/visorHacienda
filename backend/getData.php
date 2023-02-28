<?php

$data = array();

$sentencia_consulta = 'SELECT `id`, `No Identificacion`, `Porpietario`,`Direccion`, `Ficha  Catastral`, `Total 2018`,`Total 2019`,`Total 2020`,`Total 2021`,`Total 2022`,`Total 2023`,`Valor a Pagar Vigencia`,`Fecha Vencimiento` FROM '.$nombre_tabla;
$resultado_consulta = mysqli_query($con, $sentencia_consulta);
while ($filas = mysqli_fetch_assoc($resultado_consulta)) {
    $data[] = $filas;
}

echo json_encode(array("data" => $data));
