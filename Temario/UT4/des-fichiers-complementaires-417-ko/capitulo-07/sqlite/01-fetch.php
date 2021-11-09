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
    // mostrar_matriz.
    require('../../include/funciones.inc.php');
    // Apertura de la base.
    $base = new SQLite3('/app/sqlite/diane.dbf');
    // Definición de la consulta.
    $consulta = 'SELECT * FROM artículo';
    // Ejecución de la consulta.
    $resultado = $base->query($consulta);
    // Primer fetch sin parámetro.
    $línea = $resultado->fetchArray();
    mostrar_matriz($línea,'sin parámetro');
    // Segundo fetch con SQLITE3_BOTH.
    $línea = $resultado->fetchArray(SQLITE3_BOTH);
    mostrar_matriz($línea,'SQLITE3_BOTH');
    // Tercer fetch con SQLITE3_ASSOC.
    $línea = $resultado->fetchArray(SQLITE3_ASSOC);
    mostrar_matriz($línea,'SQLITE3_ASSOC');
    // Cuarto fetch con SQLITE3_NUM.
    $línea = $resultado->fetchArray(SQLITE3_NUM);
    mostrar_matriz($línea,'SQLITE3_NUM');
    // Quinto fetch de nuevo sin parámetro:
    //  - normalmente, ninguna línea
    $línea = $resultado->fetchArray();
    if (! $línea) {
      echo "<p><b>Quinto fetch: nada más</b>";
    }
    // Cierre de la base de datos. 
    $ok = $base->close(); 
    ?>

    </div>
  </body>
</html>
