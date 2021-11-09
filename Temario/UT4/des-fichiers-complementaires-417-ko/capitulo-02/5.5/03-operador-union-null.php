<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>El operador de unión NULL</title>
  </head>
  <body>
    <div>
    <?php
    // Visualización de un mensaje que depende del valor de $nombre.
    // Por el momento, esta variable no se inicializa.
    echo '¡Hola '.($nombre??'desconocido').' ! <br />';
    // Asignación de un valor a la variable $nombre.
    $nombre = 'Olivier';
    // Nuevo intento.
    echo '¡Hola '.($nombre??'desconocido').' ! <br />';
    // Funciona con varios operandos.
    // Aquí, la variable $nombre no se ha inicializado.
    echo '¡Hola '.($nombre??$apellidos??'desconocido').' ! <br />';
    ?>
    </div>
  </body>
</html>
