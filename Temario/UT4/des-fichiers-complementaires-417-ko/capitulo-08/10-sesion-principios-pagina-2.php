<?php
// Inclusión del archivo que contiene las 
// funciones generales
include('../include/funciones.inc.php');
// Abrir/reactivar la sesión.
session_start();
// Comprobar si la sesión es nueva (está abierta por
// la llamada a session_start() a continuación) o es antigua (abierta
// por una llamada anterior a session_start()).
// Lo mejor es comprobar si una de nuestras variables de sesión
// ya está registrada).
if (! isset($_SESSION['fecha']) ) {
  // Variable "fecha" todavía no registrada. 
  // => nueva sesión.
  // => iniciar la sesión a nivel de aplicación
  // Para este ejemplo:
  // - determinar la fecha/hora de inicio de sesión
  $fecha = date('\e\l d/m/Y a las H:i:s');
  // - registrar la fecha/hora de inicio de sesión
  $_SESSION['fecha'] = $fecha;
  // recuperar el identificador de la sesión (para información)
  $sesión = session_id();
  // Preparar un mensaje
  $mensaje = "Nueva sesión: $sesión - $fecha";
} else {
  // Variable "fecha" ya registrada.
  // => antigua sesión.
  // => recuperar las variables de sesión utilizadas 
  // en este script.
  // Para este ejemplo:
  // - fecha/hora de inicio de sesión
  $fecha = $_SESSION['fecha'];
  // recuperar el identificador de la sesión (para información)
  $sesión = session_id();
  // Preparar un mensaje
  $mensaje = "Sesión ya iniciada: $sesión - $fecha";
}
// Determinación de la fecha y de la hora actual (no la
// del inicio de sesión).
$actual = 'Hoy es el día '.date('d/m/Y').
          '; son las '.date('H:i:s');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Página 2</title>
  </head>
  <body>
    <div>
    <b>Página 2 - <?php echo $actual; ?></b><br />
    <?php echo $mensaje; ?><br />
    <!-- enlace a las otras páginas -->
    <a href="<?php echo url('10-sesion-principios-pagina-1.php'); ?>">Página 1</a>
    </div>
  </body>
</html>
