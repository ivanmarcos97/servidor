<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Leer una línea</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>

    <h1>Consulta no preparada</h1>
    <?php
    // Identificador del artículo que se va a leer.
    $identificador = 1;
    // Apertura. 
    $base = new SQLite3('/app/sqlite/diane.dbf'); 
    // Ejecución de la consulta de selección.
    $consulta = "SELECT * FROM artículos" .
                "WHERE identificador = $identificador";
    $resultado = $base->query($consulta); 
    // Lectura y visualización del resultado
    $artículo = $resultado->fetchArray(); 
    echo $artículo['identificador'],' - ',$artículo['texto'],
         ' - ',$artículo['precio'],'<br />';
    // Cierre. 
    $ok = $base->close(); 
    ?>
    
    <h1>Consulta preparada</h1>
    <?php
    // Identificador del artículo que se va a leer.
    $identificador = 1;
    // Apertura de la base. 
    $base = new SQLite3('/app/sqlite/diane.dbf'); 
    // Preparación de la consulta de selección.
    $sql = 'SELECT * FROM artículos WHERE identificador = ?';
    $consulta = $base->prepare($sql); 
    // Vinculación de los parámetros.
    $ok = $consulta->bindParam(1,$identificador); 
    // Ejecución de la consulta.
    $resultado = $consulta->execute(); 
    // Lectura y visualización del resultado
    $artículo = $resultado->fetchArray(); 
    echo $artículo['identificador'],' - ',$artículo['texto'],
         ' - ',$artículo['precio'],'<br />';
    // Cierre de la base de datos. 
    $ok = $base->close(); 
    ?>

    </div>
  </body>
</html>
