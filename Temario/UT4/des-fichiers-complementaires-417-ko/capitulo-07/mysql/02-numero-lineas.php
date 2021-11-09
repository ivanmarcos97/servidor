<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Número de líneas en el resultado de una consulta de lectura</title>
  </head>
  <body>
    <div>

    <?php
    // Conexión (utilización de los valores predeterminados).
    $conexión = mysqli_connect();
    if (! $conexión) {
      exit('Error de conexión.');
    }
    // Selección de la base de datos.
    $ok = mysqli_select_db($conexión,'diane');
    if (! $ok) {
      exit('No se pudo seleccionar la base de datos.');
    }
    // Ejecución de una consulta SELECT.
    $consulta = mysqli_query($conexión,'SELECT * FROM artículos');
    if ($consulta === FALSE) {
      echo 'Error de ejecución de la consulta.','<br />';
    } else {
      // Visualización del número de líneas en el resultado
      echo 'Número de artículos: ',mysqli_num_rows($consulta) ,'<br />';
    }
    // Ejecución de otra consulta SELECT.
    $consulta = mysqli_query($conexión,'SELECT * FROM artículos WHERE precio > 40');
    if ($consulta === FALSE) {
      echo 'Error de ejecución de la consulta.','<br />';
    } else {
      // Visualización del número de líneas en el resultado
      echo
        'Número de artículos cuyo precio es superior a 40: ',
        mysqli_num_rows($consulta),
        '<br />';
    }
    // Desconexión.
    $ok = mysqli_close($conexión);
    ?>

    </div>
  </body>
</html>
