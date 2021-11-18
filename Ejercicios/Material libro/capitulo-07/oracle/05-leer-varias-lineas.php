<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Leer varias líneas</title>
  </head>
  <body>
    <div>

    <?php
    // Conexión.
    $conexión = oci_connect('demeter','demeter','diane'); 
    // Definición de la consulta. 
    $consulta = 'SELECT identificador,texto, FROM artículos'; 
    // Análisis de la consulta. 
    $cursor = oci_parse($conexión,$consulta); 
    // Ejecución de la consulta. 
    $ok = oci_execute($cursor); 
    // Lectura y visualización del resultado
    while ($artículo = oci_fetch_assoc($cursor)) {
      echo $artículo['IDENTIFICADOR'],' - ',$artículo['TEXTO'],'<br />';
    }
    // Desconexión.
    $ok = oci_close($conexión);
    ?>

    </div>
  </body>
</html>
