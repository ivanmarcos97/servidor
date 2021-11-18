<?php
// Inicialización de una variable.
$nombre='Olivier';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>URL - Página 1</title>
  </head>
  <body>
    <div>
    <!-- enlace a la página 2 pasando el valor de $nombre 
         en la URL -->
    <a href="05-url-pagina-2.php?nombre=<?= $nombre ?>">Página 2</a>
    </div>
  </body>
</html>
