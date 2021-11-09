<?php
include_once('commun.inc.php');
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
    analizar_vocales($nombre,$nombre_vocales,$empieza_por_vocal);
    if ($empieza_por_vocal) {
      echo 'Su nombre empieza por una vocal.<br />';
    } else {
      echo 'Su nombre empieza por una consonante.<br />';
    }
    echo "Su nombre tiene $nombre_vocales vocales.<br />";
    ?>
    </div>
  </body>
</html>