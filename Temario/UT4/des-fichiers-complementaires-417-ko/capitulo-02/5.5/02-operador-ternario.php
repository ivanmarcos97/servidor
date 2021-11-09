<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>El operador ternario</title>
  </head>
  <body>
    <div>
    <?php
    // Inicialización de una variable.
    $nombre = '';
    // Visualización de un mensaje que depende del valor de $nombre.
    echo '¡Hola '.(($nombre=='')?'desconocido':$nombre).' ! <br />';
    echo '¡Hola '.($nombre?:'desconocido').' ! <br />'; // versión 5.3
    // Asignación de un valor a la variable $nombre.
    $nombre = 'Olivier';
    // Nuevo intento.
    echo '¡Hola '.(($nombre=='')?'desconocido':$nombre).' ! <br />';
    echo '¡Hola '.($nombre?:'desconocido').' ! <br />'; // versión 5.3
    ?>
    </div>
  </body>
</html>
