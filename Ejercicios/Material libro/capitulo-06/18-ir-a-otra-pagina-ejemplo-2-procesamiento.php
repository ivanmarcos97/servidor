<?php
// Incluir el archivo que contiene las definiciones de nuestras 
// funciones generales.
include('../include/funciones.inc.php');
// Comprobar cómo se llama al script.
if (isset($_POST['ok'])) {
  // Procesamiento del formulario.
  // Recuperar los datos introducidos en el formulario.
  $nombre = trim($_POST['nombre']);
  // Controlar los valores introducidos
  if ($nombre == '')
    { $mensaje .= "El nombre es obligatorio.\n"; }
  if (strlen($nombre) > 10)
    { $mensaje .= "El nombre debe tener al menos 10 caracteres.\n"; }
  // Comprobar si hay errores.
  if ($mensaje == '') {
    // Ningún error.
    // Redirigir al usuario a otra página y detener
    // la ejecución del script.
    header('location: 00-inicio.php');
    exit;
  } else {
    // Error.
    // Preparar el mensaje para mostrarlo.
    $mensaje = hacia_página($mensaje);
  }
}
// En el código HTML siguiente, inclusión de una pequeña porción de
// código PHP para mostrar el mensaje.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Error</title>
  </head>
  <body>
    <!-- Pequeño formulario que contiene un botón que permite
    ---- volver atrás (con JavaScript) para realizar correcciones.
    -->
    <form>
    <div>
      <?php echo $mensaje; ?><br />
      <input type="button" value="Corregir" onClick="self.history.back()">
    </div>
    </form>
  </body>
</html>
