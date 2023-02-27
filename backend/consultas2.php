<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $datosJson = file_get_contents("php://input");
  $datos = json_decode($datosJson, true);

  // Aquí puedes hacer lo que quieras con los datos recibidos, por ejemplo:
  $nombre = $datos["cedula"];
  $apellido = $datos["apellido"];
  $email = $datos["email"];

  // Aquí podrías guardar los datos en una base de datos, enviar un correo electrónico, etc.

  // Finalmente, envía una respuesta al cliente indicando que la operación se completó con éxito
  http_response_code(200);
  echo json_encode(array("mensaje" => "Servidor: Formulario enviado con éxito", "cedula"=>$nombre));
}