<?php
// Incluir un archivo que contiene las diferentes funciones generales.
require('../../include/funciones.inc.php');
// El número del caso que se va a probar se pasa en la URL con la variable 'prueba'
// Recuperar la valor de la variable (1 por defecto = MySQL).
$prueba = filter_input(INPUT_GET,'prueba',FILTER_VALIDATE_INT)?:1;
switch ($prueba) {
  case 1: // MySQL
  default:
    require('./mysql.inc.php');
    break;
  case 2: // Oracle
    require('./oracle.inc.php');
    break;
  case 3: // SQLite
    require('./sqlite.inc.php');
    break;
}
// Inicializar la variable de mensaje.
$mensaje = '';
// Conectarse.
$ok = conexión($conexión,$error);
if (! $ok) {
  $mensaje = "Error de conexión a la base de datos ($error).";
}
// Seleccionar los artículos.
if ($ok) {
  $ok = seleccionar_artículos($conexión,$resultado,$error);
  if (! $ok) {
    $mensaje = "Error en la selección de los artículos ($error).";
  }
}
// Mostrar la página ...
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Lista de selección</title>
  </head>
  <body>
    <?php if ($ok): ?>
    <!-- si todo está pasado correctamente, crear el formulario -->
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
    <div>
    Frutas favoritas:<br />
    <select name="frutas[]" multiple size="8">
    <?php
    // Código PHP que genera la parte dinámica del formulario.
    // Examinar la lista que se va a mostrar.
    $número_artículos = 0;
    while ($ok = leer_artículo_siguiente($conexión,$resultado,$artículo,$error)) {
      $número_artículos++;
      // Dar formato a los datos.
      $identificador = $artículo['identificador'];
      $texto = hacia_formulario($artículo['texto']);
      // Generar la etiqueta 'option' con el identificador
      // para el atributo "value" y la etiqueta para el texto 
      // mostrado en la lista.
      printf("<option value=\"%s\">%s\n",$identificador,$texto);
    }
    // En caso de error o si el resultado está vacío, preparar un mensaje.
    if ($ok === FALSE) { // error en la lectura
      $mensaje = "Error en la lectura de los artículos ($error).";
    } elseif ($número_artículos == 0) { // ningún artículo
      $mensaje = 'Ningún artículo en la base de datos.';
    }
    ?>
    </select>
    <input type="submit" name="ok" value="OK" /><br />
    </div>
    </form>
    <?php endif; ?>
    <!-- mostrar un posible mensaje -->
    <div><?= hacia_página($mensaje) ?></div>
  </body>
</html>
