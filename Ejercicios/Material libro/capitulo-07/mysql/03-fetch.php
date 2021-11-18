<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Probar las diferentes técnicas de fetch</title>
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
    // Ejecución de una consulta
    $sql = 'SELECT * FROM artículos';
    $consulta = mysqli_query($conexión,$sql);
    // Primer fetch con mysqli_fetch_row.
    $línea = mysqli_fetch_row($consulta);
    mostrar_matriz($línea,'mysql_fetch_row');
    // Segundo fetch con mysql_fetch_assoc.
    $línea = mysqli_fetch_assoc($consulta);
    mostrar_matriz($línea,'mysql_fetch_assoc');
    // Tercer fetch con mysql_fetch_array:
    // -> sin segundo parámetro = MYSQLI_BOTH
    $línea = mysqli_fetch_array($consulta);
    mostrar_matriz($línea,'mysql_fetch_array');
    // Cuarto fetch con mysql_fetch_object.
    $línea = mysqli_fetch_object($consulta);
    echo "<p /><b>mysql_fetch_object</b><br />";
    echo "\$línea->identificador= $línea->identificador<br />";
    echo "\$línea->texto = $línea->texto<br />";
    echo "\$línea->precio = $línea->precio<br />";
    // Quinto fetch de nuevo con mysql_fetch_row:
    // -> normalmente, más línea.
    $línea = mysqli_fetch_row($consulta);
    if ($línea === NULL) {
    	echo '<p /><b>Quinto fetch: nada más</b>';
    }
    // Desconexión.
    $ok = mysqli_close($conexión);
    ?>

    </div>
  </body>
</html>
