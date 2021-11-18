<?php
include_once('commun.inc.php');
$numero = filter_input(INPUT_GET,'numero',FILTER_VALIDATE_INT); 
if (is_int($numero) and array_key_exists($numero,$autores)) {
  $autor = $autores[$numero];
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <meta charset="utf-8" />
    <title>Autor</title>
  </head>
  <body>
    <h1><?= isset($autor)?$autor:'Autor no encontrado' ?></h1>
    <p><a href="inicio.php">Volver a la lista</a></p>
  </body>
</html>