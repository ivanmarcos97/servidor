<?php
const MI_SITIO = 'miSitio.com';
$nombre = 'Olivier';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <meta charset="utf-8" />
    <title>Inicio</title>
  </head>
  <body>
    <div>
    <?php
    // Mostrar los mensajes
    echo "Hola $nombre.<br />";
    echo 'Bienvenido a ',MI_SITIO,'.<br />';
    // Contar el número de letras del nombre.
    $i = 0;
    while ($nombre[$i]) {
      $i++;
    }
    echo "Su nombre tiene $i letras.<br />";
    ?>
    </div>
  </body>
</html>