<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Consulta preparada: lectura con resultado almacenado</title>
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
    echo '<b>Antes de la llamada a mysqli_stmt_store_result</b><br />', 
         'Número de líneas seleccionadas = ', 
         mysqli_stmt_num_rows($consulta),'<br />'; 
    $ok = mysqli_stmt_store_result($consulta); 
    echo '<b>Después de la llamada a mysqli_stmt_store_result</b><br />', 
         'Número de líneas seleccionadas = ', 
         mysqli_stmt_num_rows($consulta),'<br />'; 
    // Lectura del resultado. 
    echo "<b>Artículos cuyo precio es < $precio_max </b><br />"; 
    while (mysqli_stmt_fetch($consulta)) { 
      echo "$texto<br />"; 
    } 
    // Desconexión. 
    $ok = mysqli_close($conexión); 
    ?>

    </div>
  </body>
</html>
