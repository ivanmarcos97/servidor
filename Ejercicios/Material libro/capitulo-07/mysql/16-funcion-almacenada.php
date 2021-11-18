<?php echo '<?xml version="1.0" encoding="UTF-8"?>',"\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Función almacenada</title>
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
    // Ejecución de la consulta que llama a la función
    // (la expresión que llama a la función se denomina con
    // un alias de columna).
    $sql = "SELECT fs_número_artículos($precio_max) nb";
    $consulta = mysqli_query($conexión,$sql);
    $línea = mysqli_fetch_assoc($consulta);
    echo 'Número de artículos = ',$línea['nb'];
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
    // Ejecución de la consulta que llama a la función
    // (la expresión que llama a la función se denomina con
    // un alias de columna).
    $sql = "SELECT fs_número_artículos(?) nb";
    $consulta = mysqli_prepare($conexión,$sql);
    $ok = mysqli_stmt_bind_param($consulta,'d',$precio_max);
    $ok = mysqli_stmt_execute($consulta);
    $ok = mysqli_stmt_bind_result($consulta,$nb);
    $ok = mysqli_stmt_fetch($consulta);
    echo 'Número de artículos = ',$nb;
    // Desconexión.
    $ok = mysqli_close($conexión);
    ?>

    </div>
  </body>
</html>
