<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Consulta preparada: gestión de los errores</title>
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
    // Preparación de una consulta sobre una tabla que no existe. 
    $sql = 'SELECT * FROM artículo'; 
    $consulta = mysqli_prepare($conexión, $sql); 
    // Uso de mysqli_errno y mysqli_error en este punto. 
    echo '1: ',mysqli_errno($conexión),' - ', 
                mysqli_error($conexión),'<br />'; 
    // Preparación de una consulta (sobre una tabla que existe). 
    $sql = 'INSERT INTO artículos(identificador,texto) VALUES(?,?)'; 
    $consulta = mysqli_prepare($conexión, $sql); 
    // Vinculación de los parámetros. 
    $ok = mysqli_stmt_bind_param($consulta,'is',$identificador,$texto); 
    // Ejecución de la consulta (viola una clave única). 
    $identificador = 3; 
    $texto = 'Kiwis'; 
    $ok = mysqli_stmt_execute($consulta); 
    echo '2: ',mysqli_stmt_errno($consulta),' - ', 
                mysqli_stmt_error($consulta),'<br />'; 
    // Desconexión. 
    $ok = mysqli_close($conexión); 
    ?>

    </div>
  </body>
</html>
