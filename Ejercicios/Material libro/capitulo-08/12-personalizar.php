<?php
// Inclusión del archivo que contiene las funciones generales.
include('../include/funciones.inc.php');
// Abrir/reactivar la sesión.
session_start();
// Inicialización de las variables.
$mensaje = '';
// ¿La sesión se ha iniciado al nivel de la aplicación?
if (isset($_SESSION['identificador'])) { // sí
  // Recuperar toda la información de sesión.
  $identificador = $_SESSION['identificador'];
  $contraseña = $_SESSION['contraseña'];
  // ¿Se llama al script en el procesamiento del formulario?
  if (isset($_POST['activar'])) { // sí
    // Activar la conexión automática.
    // Depositar dos cookies de un tiempo de vida de 30 días,
    // una para el identificador del usuario y una para su
    // contraseña.
    $vencimiento = time()+ (30 * 24 * 3600);
    setcookie('identificador',$identificador,$vencimiento);
    setcookie('contraseña',$contraseña,$vencimiento);
    // Preparar un mensaje.
    $mensaje = 'Conexión automática activada';
  } elseif (isset($_POST['désactivar'])) { // sí
    // Desactivar la conexión automática.
    // Eliminar las dos cookies.
    setcookie('identificador');
    setcookie('contraseña');
    // Preparar un mensaje.
    $mensaje = 'Conexión automática desactivada';
  }
} else { // Sesión no abierta a nivel de aplicación.
  // Redirigir al usuario a la página de inicio de sesión
  header('Location: 12-login.php');
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>MiSitio.com - Personalizar</title>
  </head>
  <body>
    <form action="12-personalizar.php" method="post">
    <div>
    <input type="submit" name="activar" 
           value="Activar la conexión automática" /><br />
    <input type="submit" name="desactivar" 
           value="Desactivar la conexión automática" /><br />
    <?php echo $mensaje; ?><br />
    </div>
    </form>
  </body>
</html>
