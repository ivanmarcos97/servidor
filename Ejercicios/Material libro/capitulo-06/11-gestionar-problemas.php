<?php
// Inclusión del archivo que contiene las definiciones de nuestras 
// funciones generales.
include('../include/funciones.inc.php');
// Comprobar si se llama a la página después de la validación del formulario
if (isset($_POST['ok'])) {
  // Recuperación del valor introducido en el formulario.
  $nombre = isset($_POST['nombre'])?$_POST['nombre']:'';
  // El valor introducido se vuelve a mostrar en el formulario y 
  // en la página ...
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Entrada</title>
  </head>
  <body>
    <form action="11-gestionar-problemas.php" method="post">
    <div>
      Nombre: 
      <input type="text" name="nombre" 
        value="<?= hacia_formulario($nombre) ?>" />
      <input type="submit" name="ok" value="OK" /><br />
      <?= hacia_página($nombre) ?>
    </div>
    </form>
  </body>
</html>
