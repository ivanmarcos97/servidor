<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Consulta preparada: lectura</title>
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
    // Preparación de la consulta. 
    $sql = 'SELECT texto,precio FROM artículos WHERE precio < ?'; 
    $consulta = mysqli_prepare($conexión, $sql); 
    // Vinculación de los parámetros. 
    $ok = mysqli_stmt_bind_param($consulta,'d',$precio_max); 
    // Vinculación de las columnas del resultado. 
    $ok = mysqli_stmt_bind_result($consulta,$texto,$precio); 
    // Ejecución de la consulta. 
    $precio_max = 35; 
    $ok = mysqli_stmt_execute($consulta); 
    // Lectura del resultado. 
    echo "<b>Artículos cuyo precio es < $precio_max </b><br />"; 
    while (mysqli_stmt_fetch($consulta)) { 
      echo "$texto - $precio<br />"; 
    } 
    // Nueva ejecución y lectura del resultado 
    // (no es necesario volver a hacer las vinculaciones). 
    $precio_max = 40; 
    $ok = mysqli_stmt_execute($consulta); 
    echo "<b>Artículos cuyo precio es < $precio_max </b><br />"; 
    while (mysqli_stmt_fetch($consulta)) { 
      echo "$texto - $precio<br />"; 
    } 
    ?>

    </div>
  </body>
</html>
