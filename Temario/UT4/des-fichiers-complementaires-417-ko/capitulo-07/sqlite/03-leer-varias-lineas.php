<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Leer varias líneas</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>

    <h1>Consulta no preparada</h1>
    <?php
    // Apertura. 
    $base = new SQLite3('/app/sqlite/diane.dbf'); 
    // Ejecución de la consulta de selección.
    $consulta = 'SELECT * FROM artículo';
    $resultado = $base->query($consulta); 
    // Lectura y visualización del resultado
    while ($artículo = $resultado->fetchArray()) {
      echo $artículo['identificador'],' - ',$artículo['texto'],
           ' - ',$artículo['precio'],'<br />';
    }
    // Cierre. 
    $ok = $base->close(); 
    ?>

    <h1>Consulta preparada</h1>
    <?php
    // Apertura de la base. 
    $base = new SQLite3('/app/sqlite/diane.dbf'); 
    // Preparación de la consulta de selección.
    $sql = 'SELECT * FROM artículos WHERE precio < ?';
    $consulta = $base->prepare($sql); 
    // Vinculación de los parámetros.
    $ok = $consulta->bindParam(1,$precio_max); 
    // Ejecución de la consulta.
    $precio_max = 35; 
    $resultado = $consulta->execute(); 
    // Lectura del resultado. 
    echo "<b>Artículos cuyo precio es < $precio_max </b><br />"; 
    while ($artículo = $resultado->fetchArray()) {
      echo $artículo['texto'],' - ',$artículo['precio'],'<br />';
    }
    // Nueva ejecución y lectura del resultado 
    // (no es necesario volver a hacer las vinculaciones). 
    $precio_max = 40; 
    $resultado = $consulta->execute(); 
    // Lectura del resultado. 
    echo "<b>Artículos cuyo precio es < $precio_max </b><br />"; 
    while ($artículo = $resultado->fetchArray()) {
      echo $artículo['texto'],' - ',$artículo['precio'],'<br />';
    }
    // Cierre de la base de datos. 
    $ok = $base->close(); 
    ?>

    </div>
  </body>
</html>
