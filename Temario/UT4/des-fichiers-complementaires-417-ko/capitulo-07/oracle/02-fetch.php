<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Probar las diferentes técnicas de fetch (oci_fetch_*)</title>
  </head>
  <body>
    <div>

    <?php
    // Inclusión del archivo que contiene la definición de
    // mostrar_matriz.
    require('../../include/funciones.inc.php');
    // Conexión. 
    $conexión = oci_connect('demeter','demeter','diane'); 
    // Definición de la consulta. 
    $consulta = 'SELECT * FROM artículo'; 
    // Análisis de la consulta. 
    $cursor = oci_parse($conexión,$consulta); 
    // Ejecución de la consulta. 
    $ok = oci_execute($cursor); 
    // Determinación del número de líneas leídas en este punto. 
    $número = oci_num_rows($cursor); 
    echo "$número líneas leídas en este punto"; 
    // Primer fetch con oci_fetch_row. 
    $línea = oci_fetch_row($cursor); 
    mostrar_matriz($línea,'oci_fetch_row'); 
    // Determinación del número de líneas leídas en este punto. 
    $número = oci_num_rows($cursor); 
    echo "$número líneas leídas en este punto"; 
    // Segundo fetch con oci_fetch_assoc. 
    $línea = oci_fetch_assoc($cursor); 
    mostrar_matriz($línea,'oci_fetch_assoc'); 
    // Determinación del número de líneas leídas en este punto. 
    $número = oci_num_rows($cursor); 
    echo "$número líneas leídas en este punto"; 
    // Tercer fetch con oci_fetch_array: 
    // - sin segundo parámetro = OCI_BOTH. 
    $línea = oci_fetch_array($cursor); 
    mostrar_matriz($línea,'oci_fetch_array'); 
    // Determinación del número de líneas leídas en este punto. 
    $número = oci_num_rows($cursor); 
    echo "$número líneas leídas en este punto"; 
    // Cuarto fetch con oci_fetch_object. 
    $línea = oci_fetch_object($cursor); 
    echo "<br /><b>oci_fetch_object</b><br />"; 
    echo "\$línea->IDENTIFICADOR= $línea->IDENTIFICADOR<br />"; 
    echo "\$línea->TEXTO = $línea->TEXTO<br />"; 
    echo "\$línea->PRECIO = $línea->PRECIO<br />"; 
    // Determinación del número de líneas leídas en este punto. 
    $número = oci_num_rows($cursor); 
    echo "$número líneas leídas en este punto"; 
    // Quinto fetch de nuevo sin parámetro: 
    //  - normalmente, ninguna línea. 
    $línea = oci_fetch_array($cursor); 
    if (! $línea) { 
      echo "<br /><b>Quinto fetch: nada más</b><br />"; 
    } 
    // Determinación del número de líneas leídas en este punto. 
    $número = oci_num_rows($cursor); 
    echo "$número líneas leídas en este punto"; 
    // Desconexión. 
    $ok = oci_close($conexión); 
    ?>

    </div>
  </body>
</html>
