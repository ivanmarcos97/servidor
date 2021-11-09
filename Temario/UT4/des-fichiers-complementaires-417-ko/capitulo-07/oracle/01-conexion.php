<?php echo '<?xml version="1.0" encoding="UTF-8"?>',"\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Conexión y desconexión</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una pequeña función que abre una conexión.
    function conectar($usuario,$contraseña,$host) {
      $conexión = @oci_connect($usuario,$contraseña,$host);
      if ($conexión) {
        echo 'Conexión con éxito.<br />';
        echo 'Versión del servidor: <br />';
        echo oci_server_version($conexión),'<br />';
      } else {
        $e = oci_error(); // observe la llamada sin parámetro 
        printf(
          'error %d: %s.<br />',
          $e['código'],$e['mensaje']);
      }
      return $conexión;
    }
    // Definición de una pequeña función que cierra una conexión.
    function desconectar($conexión) {
      if ($conexión) {
        $ok = @oci_close($conexión);
        if ($ok) {
          echo 'Desconexión con éxito.<br />';
        } else {
          echo 'Error en la desconexión. <br />';
        }
      } else {
          echo 'Conexión no abierta.<br />';
      }
    }
    // Primera prueba de conexión/desconexión.
    echo '<b>Primera prueba</b><br />';
    $conexión = conectar('demeter','demeter','diane');
    desconectar($conexión);
    // Segunda prueba de conexión/desconexión.
    echo '<b>Segunda prueba</b><br />';
    $conexión = conectar('desconocido','desconocido','diane');
    desconectar($conexión);
    ?>

    </div>
  </body>
</html>
