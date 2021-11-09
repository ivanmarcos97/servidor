<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Probar las diferentes técnicas de fetch (oci_fetch_all)</title>
  </head>
  <body>
    <div>

    <?php
    // Inclusión del archivo que contiene la definición de
    // mostrar_matriz.
    require('../../include/funciones.inc.php');
    // Conexión.
    $conexión = oci_connect('demeter','demeter','diane','UTF8');
    // Definición de la consulta.
    $consulta = 'SELECT * FROM artículo';
    // Análisis de la consulta.
    $cursor = oci_parse($conexión,$consulta);
    // Ejecución de la consulta.
    $ok = oci_execute($cursor);
    // Fetch de todas las líneas:
    // - parámetros por defecto.
    $número = oci_fetch_all($cursor,$resultado);
    mostrar_matriz($resultado,
      'oci_fetch_all($cursor,$resultado)');
    echo ($número)?"$número líneas del resultado":'FALSE';
    // Otra determinación del número de líneas leídas.
    $número = oci_num_rows($cursor);
    echo "<br />$número líneas en el resultado";
    // Ejecución de la consulta.
    $ok = oci_execute($cursor);
    // Fetch de todas las líneas:
    // - resultado parcial: ignorar la 1a línea
    //                      dos líneas en total.
    $número = oci_fetch_all($cursor,$resultado,1,2);
    mostrar_matriz($resultado,
      'oci_fetch_all($cursor,$resultado,1,2)');
    echo ($número)?"$número líneas del resultado":'FALSE';
    // Otra determinación del número de líneas leídas.
    $número = oci_num_rows($cursor);
    echo "<br />$número líneas en el resultado";
    // Ejecución de la consulta.
    $ok = oci_execute($cursor);
    // Fetch de todas las líneas:
    // - resultado parcial: 2 líneas en total
    // - presentación por línea
    $número = oci_fetch_all($cursor,$resultado,
          0,2,OCI_FETCHSTATEMENT_BY_ROW);
    mostrar_matriz($resultado,
      'oci_fetch_all($cursor,$resultado,'.
        '0,2,OCI_FETCHSTATEMENT_BY_ROW)');
    echo ($número)?"$número líneas del resultado":'FALSE';
    // Otra determinación del número de líneas leídas.
    $número = oci_num_rows($cursor);
    echo "<br />$número líneas en el resultado";
    // Ejecución de la consulta.
    $ok = oci_execute($cursor);
    // Fetch de todas las líneas:
    // - resultado parcial: 2 líneas en total
    // - presentación por línea
    // - matriz numérica para las columnas
    $número = oci_fetch_all($cursor,$resultado,
          0,2,OCI_FETCHSTATEMENT_BY_ROW+OCI_NUM);
    mostrar_matriz($resultado,
      'oci_fetch_all($cursor,$resultado,'.
        '0,2,OCI_FETCHSTATEMENT_BY_ROW+OCI_NUM)');
    echo ($número)?"$número líneas del resultado":'FALSE';
    // Otra determinación del número de líneas leídas.
    $número = oci_num_rows($cursor);
    echo "<br />$número líneas en el resultado";
    // Definición de una consulta que no devuelve ninguna línea.
    $consulta = "SELECT * FROM artículos WHERE 0=1";
    // Análisis de la consulta.
    $cursor = oci_parse($conexión,$consulta);
    // Ejecución de la consulta.
    $ok = oci_execute($cursor);
    // Fetch de todas las líneas:
    // - parámetros por defecto.
    $número = oci_fetch_all($cursor,$resultado);
    mostrar_matriz($resultado,'Ningún resultado: por columna');
    echo ($número)?"$número líneas del resultado":'FALSE';
    // Otra determinación del número de líneas leídas.
    $número = ociRowCount($cursor);
    echo "<br />$número línea en el resultado";
    // Ejecución de la consulta.
    $ok = oci_execute($cursor);
    // Fetch de todas las líneas:
    // - presentación por línea
    $número = oci_fetch_all($cursor,$resultado,0,-1,OCI_FETCHSTATEMENT_BY_ROW);
    mostrar_matriz($resultado,'Ningún resultado: por línea');
    echo ($número)?"$número líneas del resultado":'FALSE';
    // Otra determinación del número de líneas leídas.
    $número = ociRowCount($cursor);
    echo "<br />$número línea en el resultado";
    // Desconexión. 
    $ok = oci_close($conexión); 
    ?>

    </div>
  </body>
</html>
