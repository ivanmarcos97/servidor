<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Entorno NLS</title>
  </head>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  <body>
    <div>

    <h1> Primera solución</h1>
    <?php
    // Conexión
    $conexión = oci_connect('demeter','demeter','diane','UTF8');
    // Recuperación de la fecha del servidor.
    //    - el formato esperado se obtiene por una 
    //      conversión explícita.
    $consulta = "SELECT TO_CHAR(SYSDATE, 'DD/MM/YYYY') d 
                FROM dual";
    $cursor = oci_parse($conexión,$consulta);
    $ok = oci_execute($cursor);
    $línea = oci_fetch_assoc($cursor);
    echo "SYSDATE = {$línea['D']}<br />"; // utilización del alias
    // Aumento de los precios mediante una cadena con parámetros:
    //    - la cadena implícitamente parametrada se 
    //      convierte explícitamente utilizando el formato correcto 
    $consulta = "UPDATE artículos 
                SET precio = precio * TO_NUMBER(:p1,'9.99')";
    $cursor = oci_parse($conexión,$consulta);
    oci_bind_by_name($cursor,':p1',$coeficiente,32);
    $coeficiente = 1.05; // 5% de aumento
    $ok = oci_execute($cursor);
    echo oci_num_rows($cursor),' líneas cambiadas.';
    ?>

    <h1> Segunda solución</h1>
    <?php
    // Conexión
    $conexión = oci_connect('demeter','demeter','diane','UTF8');
    // Definición del entorno deseado a través de 
    // dos consultas ALTER SESSION.
    $consulta = "ALTER SESSION SET NLS_DATE_FORMAT='DD/MM/YYYY'";
    $ok = oci_execute(oci_parse($conexión,$consulta));
    $consulta = "ALTER SESSION SET NLS_NUMERIC_CHARACTERS='.,'";
    $ok = oci_execute(oci_parse($conexión,$consulta));
    // Recuperación de la fecha del servidor
    $consulta = 'SELECT SYSDATE FROM dual';
    $cursor = oci_parse($conexión,$consulta);
    $ok = oci_execute($cursor);
    $línea = oci_fetch_assoc($cursor);
    echo "SYSDATE = {$línea['SYSDATE']}<br />";
    // Aumento de los precios mediante una cadena con parámetros.
    $consulta = 'UPDATE artículos SET precio = precio * :p1';
    $cursor = oci_parse($conexión,$consulta);
    oci_bind_by_name($cursor,':p1',$coeficiente,32);
    $coeficiente = 1.05; // 5% de aumento
    $ok = oci_execute($cursor);
    echo oci_num_rows($cursor),' líneas cambiadas.';
    ?>

    </div>
  </body>
</html>
