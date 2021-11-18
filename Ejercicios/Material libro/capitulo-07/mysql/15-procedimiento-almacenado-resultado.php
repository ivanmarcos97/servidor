<?php echo '<?xml version="1.0" encoding="UTF-8"?>',"\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Procedimiento almacenado que devuelve un resultado directamente</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>

    <h1>Consulta no preparada</h1>
    <?php
    $conexión = mysqli_connect(); 
    if (! $conexión) { 
      exit('Error de conexión.'); 
    } 
    // Selección de la base de datos. 
    $ok = mysqli_select_db($conexión,'diane'); 
    if (! $ok) { 
      exit('No se pudo seleccionar la base de datos.'); 
    } 
    // Precio máximo.
    $precio_max = 30;
    // Ejecución de la consulta de llamada del procedimiento.
    $sql = "CALL ps_leer_artículos($precio_max)";
    $consulta = mysqli_query($conexión,$sql);
    while ($línea = mysqli_fetch_assoc($consulta)) {
      echo $línea['texto'],'<br />';
    }
    // Desconexión.
    $ok = mysqli_close($conexión);
    ?>
    
    <h1>Consulta preparada</h1>
    <?php
    $conexión = mysqli_connect(); 
    if (! $conexión) { 
      exit('Error de conexión.'); 
    } 
    // Selección de la base de datos. 
    $ok = mysqli_select_db($conexión,'diane'); 
    if (! $ok) { 
      exit('No se pudo seleccionar la base de datos.'); 
    } 
    // Precio máximo.
    $precio_max = 30;
    // Ejecución de la consulta de llamada del procedimiento.
    $sql = "CALL ps_leer_artículos(?)";
    $consulta = mysqli_prepare($conexión,$sql);
    $ok = mysqli_stmt_bind_param($consulta,'d',$precio_max);
    $ok = mysqli_stmt_execute($consulta);
    // Importante hacer el bind del resultado después de la ejecución
    // ya que la estructura del resultado no se conoce antes.
    $ok = mysqli_stmt_bind_result($consulta,$texto);
    while (mysqli_stmt_fetch($consulta)) {
      echo $texto,'<br />';
    }
    // Desconexión.
    $ok = mysqli_close($conexión);
    ?>

    </div>
  </body>
</html>
