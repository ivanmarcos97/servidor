<?php echo '<?xml version="1.0" encoding="UTF-8"?>',"\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Procedimiento almacenado con parámetro OUT</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>

    <h1>Consulta no preparada</h1>
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
    // Definición de las características del nuevo artículo.
    $texto = 'Piñas';
    $precio = 19.90;
    // Ejecución de la consulta de llamada del procedimiento.
    // El parámetro OUT del procedimiento se recupera en la 
    // variable MySQL @identificador.
    $sql = "CALL ps_crear_artículo('$texto',$precio,@identificador)";
    $consulta = mysqli_query($conexión,$sql);
    // Ejecución de la consulta que lee el contenido de la 
    // variable MySQL @identificador.
    $sql='SELECT @identificador';
    $consulta = mysqli_query($conexión,$sql);
    $línea = mysqli_fetch_assoc($consulta);
    // Visualización del resultado.
    echo 'Identificador del nuevo artículo = ',
         $línea['@identificador'],'<br />';
    // Ejecución de una consulta que elimina el nuevo artículo.
    $sql = "DELETE FROM artículos WHERE identificador = {$línea['@identificador']}";
    $consulta = mysqli_query($conexión,$sql);
    // Desconexión.
    $ok = mysqli_close($conexión);
    ?>

    <h1>Consulta preparada</h1>
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
    // Definición de las características del nuevo artículo.
    $texto = 'Piñas';
    $precio = 19.90;
    // Ejecución de la consulta de llamada del procedimiento.
    // El parámetro OUT del procedimiento se recupera en la
    // variable MySQL @identificador.
    $sql = "CALL ps_crear_artículo(?,?,@identificador)";
    $consulta = mysqli_prepare($conexión,$sql);
    $ok = mysqli_stmt_bind_param($consulta,'sd',$texto,$precio);
    $ok = mysqli_stmt_execute($consulta);
    mysqli_stmt_close($consulta);
    // Ejecución de la consulta que lee el contenido de la 
    // variable MySQL @identificador.
    $sql='SELECT @identificador';
    $consulta = mysqli_prepare($conexión,$sql);
    $ok = mysqli_stmt_bind_result($consulta,$identificador);
    $ok = mysqli_stmt_execute($consulta);
    $ok = mysqli_stmt_fetch($consulta);
    mysqli_stmt_close($consulta);
    // Visualización del resultado.
    echo "Identificador del nuevo artículo = $identificador"; 
    // Ejecución de una consulta que elimina el nuevo artículo.
    $sql = 'DELETE FROM artículos WHERE identificador = ?';
    $consulta = mysqli_prepare($conexión,$sql);
    $ok = mysqli_stmt_bind_param($consulta,'d',$identificador);
    $ok = mysqli_stmt_execute($consulta);
    // Desconexión.
    $ok = mysqli_close($conexión);
    ?>

    </div>
  </body>
</html>
