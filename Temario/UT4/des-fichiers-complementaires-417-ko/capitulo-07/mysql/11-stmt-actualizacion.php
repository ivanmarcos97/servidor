<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Consulta preparada: actualización</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una pequeña función para mostrar la lista 
    // de artículos. 
    // Esta función utiliza una consulta preparada que se 
    // preparará solo una vez, en la primera llamada.
    // La variable que almacena el resultado de la preparación así como
    // la matriz utilizada para la vinculación son variables estáticas
    // cuyos valores se conservan de una llamada a otra.
    function mostrar_artículos ($conexión) { 
      static $consulta;
      static $línea = array();
      if (! isset($consulta)) { // $consulta no definida = primera llamada
        $sql = 'SELECT * FROM artículos'; 
        $consulta = mysqli_prepare($conexión,$sql);
        $ok = mysqli_stmt_bind_result($consulta,$línea[],$línea[],$línea[]); 
      }
      $ok = mysqli_stmt_execute($consulta); 
      echo '<b>Lista de artículos:</b><br />'; 
      while (mysqli_stmt_fetch($consulta)) { 
        echo $línea[0],' - ',$línea[1],' - ',$línea[2],'<br />'; 
      } 
    } 
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
    // Visualización de control. 
    mostrar_artículos($conexión); 
    // Actualizaciones.
    echo '<b>Actualizaciones:</b><br />'; 
    // Consulta INSERT.
    // Preparación de la consulta.
    $sql = 'INSERT INTO artículos(texto,precio) VALUES(?,?)';
    $consulta = mysqli_prepare($conexión, $sql);
    // Vinculación de los parámetros.
    $ok = mysqli_stmt_bind_param($consulta,'sd',$texto,$precio);
    // Ejecución de la consulta.
    $texto = 'Manzanas';
    $precio = 24.5;
    $ok = mysqli_stmt_execute($consulta);
    // Recuperación del identificador.
    $identificador = mysqli_stmt_insert_id($consulta);
    echo "Identificador del nuevo artículo = $identificador.<br />";
    // Entonces es posible dar otros valores a las variables
    // y ejecutar de nuevo la consulta.
    $texto = 'Plátanos';
    $precio = 15.35;
    $ok = mysqli_stmt_execute($consulta);
    $identificador = mysqli_stmt_insert_id($consulta);
    echo "Identificador del nuevo artículo = $identificador.<br />";
    // Consulta UPDATE.
    // Preparación de la consulta.
    $sql = 'UPDATE artículos SET precio = ROUND(precio * ?,2) ' . 
           'WHERE precio < ?'; 
    $consulta = mysqli_prepare($conexión, $sql); 
    // Vinculación de los parámetros. 
    $ok = mysqli_stmt_bind_param($consulta,'dd',$aumento,$precio); 
    // Ejecución de la consulta. 
    $aumento = 1.10; 
    $precio = 40; 
    $ok = mysqli_stmt_execute($consulta); 
    // Recuperación del número de líneas modificadas. 
    $número = mysqli_stmt_affected_rows($consulta);
    echo "$número artículo(s) añadido(s).<br />";
    // Consulta DELETE.
    // Preparación de la consulta.
    $sql = 'DELETE FROM artículos WHERE precio > ?'; 
    $consulta = mysqli_prepare($conexión, $sql); 
    // Vinculación de los parámetros. 
    $ok = mysqli_stmt_bind_param($consulta,'d',$precio); 
    // Ejecución de la consulta. 
    $precio = 40; 
    $ok = mysqli_stmt_execute($consulta); 
    // Recuperación del número de líneas eliminadas. 
    $número = mysqli_stmt_affected_rows($consulta);
    echo "$nombre artículo(s) eliminado(s).<br />";
    // Visualización de control.
    mostrar_artículos($conexión);
    // Desconexión. 
    $ok = mysqli_close($conexión); 
    ?>

    </div>
  </body>
</html>
