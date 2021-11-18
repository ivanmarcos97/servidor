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
} else {
  // Presentación inicial.
  // En este sencillo ejemplo, nada que hacer.
}
// En el código HTML siguiente, inclusión de dos pequeñas porciones de
// código PHP para mostrar respectivamente el valor de los campos de 
// entrada y el mensaje.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Entrada</title>
  </head>
  <body>
    <form action="17-ir-a-otra-pagina-ejemplo-1.php" method="post">
    <div>
      Nombre: 
      <input type="text" name="nombre" 
        value="<?php echo hacia_formulario($nombre); ?>" />
      <input type="submit" name="ok" value="OK" /><br />
      <?php echo $mensaje; ?>
    </div>
    </form>
  </body>
</html>
