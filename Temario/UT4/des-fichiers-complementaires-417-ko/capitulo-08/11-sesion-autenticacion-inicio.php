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
  // Dato "identificador" ya registrado:
  // => el usuario está conectado;
  // => recuperar los datos de sesión utilizados en 
  //    el script.
  $fecha = $_SESSION ['fecha'];
  $identificador = $_SESSION['identificador'];
  // Recuperar el identificador de la sesión (para el ejemplo).
  $sesión = session_id();
  // Preparar un mensaje.
  $mensaje = "Sesión: $sesión - $identificador - $fecha";
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
    <title>Inicio</title>
  </head>
  <body>
    <div>
      <b>Inicio - <?php echo $actual; ?></b><br />
      <?php echo $mensaje; ?><br />
      <!-- Enlace a otra página. 
           Utilizar nuestra función genérica url() para estar
           seguros de que el identificador de la sesión se transmite
           independientemente de las condiciones.  -->
      <a href="<?php echo url('11-sesion-autenticacion-accion.php'); ?>">Acción</a>
    </div>
  </body>
</html>
