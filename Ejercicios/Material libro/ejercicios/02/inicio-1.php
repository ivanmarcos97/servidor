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
    echo "Hola $nombre.<br />";
    echo 'Bienvenido a ',MI_SITIO,'.<br />';
    ?>
    </div>
  </body>
</html>