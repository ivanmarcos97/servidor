<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Gestión de los errores</title>
  </head>
  <body>
    <div>

    <?php 
    // Abrir la base de datos. 
    $base = new SQLite3('/app/sqlite/diane.dbf'); 
    // Una buena consulta para empezar. 
    $consulta = 'SELECT * FROM artículo'; 
    $resultado = $base->query($consulta); 
    $código = $base->lastErrorCode(); 
    $mensaje = $base->lastErrorMsg(); 
    echo "1: $código - $mensaje<br />"; 
    // Consulta en una tabla que no existe. 
    $consulta = 'SELECT * FROM artículo'; 
    $resultado = $base->query($consulta); 
    $código = $base->lastErrorCode(); 
    $mensaje = $base->lastErrorMsg(); 
    echo "2: $código - $mensaje<br />"; 
    // Consulta INSERT que viola una clave principal. 
    $consulta = "INSERT INTO artículos(identificador,texto,precio) " . 
               "VALUES(1,'Peras',29.9)"; 
    $resultado = $base->query($consulta); 
    $código = $base->lastErrorCode(); 
    $mensaje = $base->lastErrorMsg(); 
    echo "3: $código - $mensaje<br />"; 
    // Intento de fetch en un resultado incorrecto. 
    $consulta = 'SELECT * FROM artículo'; 
    $resultado = $base->query($consulta); 
    $código = $base->lastErrorCode(); 
    $mensaje = $base->lastErrorMsg(); 
    echo "4: $código - $mensaje<br />"; 
    $línea = $resultado->fetchArray(); 
    $código = $base->lastErrorCode(); 
    $mensaje = $base->lastErrorMsg(); 
    echo "5: $código - $mensaje<br />"; 
    ?>

    </div>
  </body>
</html>
