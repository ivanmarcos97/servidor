<?php
// Inclusión del archivo que contiene las funciones generales.
include('../include/funciones.inc.php');
// Abrir/reactivar la sesión.
session_start();
// Comprobar si la sesión es nueva (abierta por 
// la llamada a session_start() a continuación) o es antigua (abierta
// por una llamada anterior a session_start()).
// Lo mejor es comprobar si uno de nuestros datos de sesión
// ya está registrado.
if (! isset($_SESSION['identificador'])) {
  // Dato "identificador" todavía no registrado:
  // => El usuario no está conectado;
  // => redirigir a la página de inicio de sesión.
  header('location: 11-sesion-autenticacion-login.php');
  exit;
} else {
  // ...
}
// ...
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Acción</title>
  </head>
  <body>
    <div>
    Acción ...
    </div>
  </body>
</html>
