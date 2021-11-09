<?php
include_once('commun.inc.php');
// Guardar los autores en un archivo.
$f = fopen('autores.txt','wb');  
foreach ($autores as $autor) {
  fwrite($f, $autor . PHP_EOL);  
}
fclose($f);  
header('location: inicio.php');
?>