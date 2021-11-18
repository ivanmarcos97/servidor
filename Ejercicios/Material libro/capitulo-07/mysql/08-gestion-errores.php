<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Consulta no preparada: gestión de los errores</title>
  </head>
  <body>
    <div>

    <?php 
    // Conexión. 
    $conexión = mysqli_connect(); 
    if (! $conexión) {
      exit('Error de conexión.');
    }
    // Selección de una base de datos incorrecta. 
    $ok = mysqli_select_db($conexión,'hermes'); 
    echo '1: ',mysqli_errno($conexión),' - ', 
                mysqli_error($conexión),'<br />'; 
    // Selección de la base de datos correcta. 
    $ok = mysqli_select_db($conexión,'diane'); 
    echo '2: ',mysqli_errno($conexión),' - ', 
                mysqli_error($conexión),'<br />'; 
    // Una buena consulta para empezar. 
    $consulta = "SELECT * FROM articulo "; 
    $resultado = mysqli_query($conexión,$consulta); 
    echo '3: ',mysqli_errno($conexión),' - ', 
                mysqli_error($conexión),'<br />'; 
    // Consulta en una tabla que no existe. 
    $consulta = 'SELECT * FROM articulo'; 
    $resultado = mysqli_query($conexión,$consulta); 
    echo '4: ',mysqli_errno($conexión),' - ', 
                mysqli_error($conexión),'<br />'; 
    // Intento de fetch en un resultado incorrecto. 
    $línea = mysqli_fetch_assoc($resultado); 
    echo '5: ',mysqli_errno($conexión),' - ', 
                mysqli_error($conexión),'<br />'; 
    // Consulta INSERT que viola una clave principal.  
    $consulta = "INSERT INTO artículos(identificador,texto,precio) " . 
                "VALUES(1,'Peras',29.9)"; 
    $resultado = mysqli_query($conexión,$consulta); 
    echo '6: ',mysqli_errno($conexión),' - ', 
                mysqli_error($conexión),'<br />'; 
    ?>

    </div>
  </body>
</html>
