<?php
include_once('commun.inc.php');
$numero = filter_input(INPUT_GET,'numero',FILTER_VALIDATE_INT); 
if (is_int($numero) and array_key_exists($numero,$autores)) {
  $autor = $autores[$numero];
  // Abrir la sesión.
  sesion_start();
  // Memorizar el timestamp UNIX de última visite del autor.
  $_SESSION['visitas'][$numero] = time();
  // Ordenar la tabla de autores visitados en orden decreciente, 
  // conservando las claves.
  arsort($_SESSION['visitas']);
  // Ordenar los tres primeros elementos de la tabla de autores visitados, 
  // conservando las claves.
  $_SESSION['visitas'] = array_slice($_SESSION['visitas'],0,3,TRUE);
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