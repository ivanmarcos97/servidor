<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Leer una línea</title>
  </head>
  <body>
    <div>

    <?php
    // Identificador del artículo que se va a leer.
    $identificador = 1;
    // Conexión.
    $conexión = oci_connect('demeter','demeter','diane'); 
    // Definición de la consulta. 
    $consulta = 'SELECT * FROM artículos WHERE identificador = :p1'; 
    // Análisis de la consulta. 
    $cursor = oci_parse($conexión,$consulta); 
    // Vinculación de los parámetros. 
    $ok = oci_bind_by_name($cursor,':p1',$identificador,1,OCI_B_INT); 
    // Ejecución de la consulta. 
    $ok = oci_execute($cursor); 
    // Lectura y visualización del resultado
    $artículo = oci_fetch_assoc($cursor);
    echo $artículo['IDENTIFICADOR'],' - ',$artículo['TEXTO'],
         ' - ',$artículo['PRECIO'],'<br />';
    // Desconexión.
    $ok = oci_close($conexión);
    ?>

    </div>
  </body>
</html>
