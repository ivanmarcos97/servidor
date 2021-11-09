<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Inicialización y asignación de una variable</title>
  </head>
  <body>
    <div>
    
    <?php
    // Inicializar una variable $nombre.
    $nombre = 'Olivier';
    // Mostrar la variable $nombre.
    echo '$nombre = ',$nombre,'<br />';
    // Mostrar la variable $Nombre.
    echo '$<b>N</b>ombre = ',$nombre;
    echo ' => vacía (es otra variable)<br />';
    // Cambiar el valor (y el tipo) de la variable $nombre.
    $nombre = 123;
    // Mostrar la variable $nombre.
    echo '$nombre = ',$nombre,'<br />';
    ?>

    </div>
  </body>
</html>
