<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Consulta no preparada: actualización</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una pequeña función para mostrar la lista 
    // de artículos. 
    function mostrar_artículos ($conexión) { 
      $sql = 'SELECT * FROM artículos'; 
      $consulta = mysqli_query($conexión,$sql);
      echo '<b>Lista de artículos:</b><br />'; 
      while($línea = mysqli_fetch_assoc($consulta)) { 
        echo $línea['identificador'],' - ',$línea['texto'],' - ',
             $línea['precio'],'<br />'; 
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
    $consulta = "INSERT INTO artículos(texto,precio)". 
                "VALUES('Peras',29.9)";
    $resultado = mysqli_query($conexión,$consulta);
    // Recuperación del identificador.
    $identificador = mysqli_insert_id($conexión);
    echo "Identificador del nuevo artículo = $identificador.<br />";
    // Consulta UPDATE.
    $consulta = 'UPDATE artículos SET precio = ROUND(precio * 1.1,2) ' . 
                'WHERE precio < 40';
    $resultado = mysqli_query($conexión,$consulta);
    // Recuperación del número de líneas modificadas. 
    $número = mysqli_affected_rows($conexión);
    echo "$número artículo(s) añadido(s).<br />";
    // Consulta DELETE.
    $consulta = 'DELETE FROM artículos WHERE precio > 40';
    $resultado = mysqli_query($conexión,$consulta);
    // Recuperación del número de líneas eliminadas. 
    $número = mysqli_affected_rows($conexión);
    echo "$número artículo(s) eliminado(s).<br />";
    // Visualización de control.
    mostrar_artículos($conexión);
    // Desconexión. 
    $ok = mysqli_close($conexión); 
    ?>

    </div>
  </body>
</html>
