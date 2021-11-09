<?php
// Asignar un valor a $nombre si un número elegido aleatoriamente
// entre 0 y 1 es igual a 1.
$nombre = (rand(0,1)==1)?'Olivier':'';
// Probar si $nombre se ha rellenado.
if ($nombre == '') {
  // La variable $nombre está vacía, esto no es normal:
  // => redirigir al usuario a una página de error.
  header('location: 16-ir-a-otra-pagina-simple-error.htm');
  // Interrumpir la ejecución de este script.
  exit;
}
// La variable $nombre no está vacía, dejar seguir el script.
$mensaje = "¡Hola $nombre!"; // preparar un mensaje
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Entrada</title>
  </head>
  <body>
  <p><?php echo $mensaje; ?></p>
  </body>
</html>
