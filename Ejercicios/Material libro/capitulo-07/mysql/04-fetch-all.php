<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Probar las diferentes técnicas de fetch (mysqli_fetch_all)</title>
  </head>
  <body>
    <div>

    <?php
    // Inclusión del archivo que contiene la definición de
    // la función 'mostrar_matriz'.
    require('../../include/funciones.inc.php');
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
    // Ejecución de una consulta.
    $sql = 'SELECT * FROM artículos';
    $consulta = mysqli_query($conexión,$sql);
    // Fetch de todas las líneas:
    // - parámetros por defecto = MYSQLI_NUM
    $resultado = mysqli_fetch_all($consulta);
    mostrar_matriz($resultado,'mysqli_fetch_all($consulta)');
    // Determinación del número de líneas leídas.
    $número = mysqli_num_rows($consulta);
    echo "$número líneas en el resultado";
    // Nueva ejecución de la consulta.
    $consulta = mysqli_query($conexión,$sql);
    // Fetch de todas las líneas:
    // - MYSQLI_ASSOC
    $resultado = mysqli_fetch_all($consulta,MYSQLI_ASSOC);
    mostrar_matriz($resultado,'mysqli_fetch_all($consulta,MYSQLI_ASSOC)');
    // Determinación del número de líneas leídas.
    $número = mysqli_num_rows($consulta);
    echo "$número líneas en el resultado";
    // Nueva ejecución de la consulta.
    $consulta = mysqli_query($conexión,$sql);
    // Fetch de todas las líneas:
    // - MYSQLI_BOTH
    $resultado = mysqli_fetch_all($consulta,MYSQLI_BOTH);
    mostrar_matriz($resultado,'mysqli_fetch_all($consulta,MYSQLI_BOTH)');
    // Determinación del número de líneas leídas.
    $número = mysqli_num_rows($consulta);
    echo "$número líneas en el resultado";
    // Desconexión.
    $ok = mysqli_close($conexión);
    ?>

    </div>
  </body>
</html>
