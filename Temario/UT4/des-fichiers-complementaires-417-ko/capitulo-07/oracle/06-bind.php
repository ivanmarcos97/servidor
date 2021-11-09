<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Consultas con parámetros</title>
  </head>
  <body>
    <div>

    <?php 
    // Conexión. 
    $conexión = oci_connect('demeter','demeter','diane'); 
    // Definición de una primera consulta con parámetros. 
    $consulta = 'SELECT * FROM artículos WHERE identificador = :p1'; 
    // Análisis de la consulta. 
    $cursor = oci_parse($conexión,$consulta); 
    // Asociación entre el parámetro y la variable PHP. 
    oci_bind_by_name($cursor,':p1',$identificador,-1,SQLT_INT); 
    // Ejecución de la consulta con un primer valor.  
    // de la variable. 
    $identificador = 1; 
    $ok = oci_execute($cursor); 
    // Leer el resultado. 
    $línea = oci_fetch_assoc($cursor); 
    echo "{$línea['IDENTIFICADOR']} - {$línea['TEXTO']}<br />"; 
    // Ejecución de la consulta con un segundo valor.  
    // de la variable (utilización del mismo cursor). 
    $identificador = 2; 
    $ok = oci_execute($cursor); 
    // Leer el resultado. 
    $línea = oci_fetch_assoc($cursor); 
    echo "{$línea['IDENTIFICADOR']} - {$línea['TEXTO']}<br />"; 
    // Definición de una consulta que selecciona las ROWID de 
    // dos maneras. 
    $consulta = 'SELECT ROWID,ROWIDTOCHAR(ROWID) rowid_cadena FROM artículos'; 
    // Análisis de la consulta. 
    $cursor = oci_parse($conexión,$consulta); 
    // Ejecución de la consulta. 
    $ok = oci_execute($cursor); 
    // Recuperación de la primera línea. 
    $línea = oci_fetch_assoc($cursor); 
    $rowid = $línea['ROWID']; 
    $rowid_cadena = $línea['ROWID_CADENA'];
    echo '$rowid = ',gettype($rowid),'<br />'; 
    echo '$rowid_cadena = ',$rowid_cadena,'<br />'; 
    // Definición de una consulta con parámetros utilizando el ROWID. 
    $consulta = 'SELECT * FROM artículos WHERE ROWID = :p1'; 
    // Análisis de la consulta. 
    $cursor = oci_parse($conexión,$consulta); 
    // Asociación entre el parámetro y la variable PHP. 
    oci_bind_by_name($cursor,':p1',$rowid,-1,SQLT_RDD); 
    // Ejecución de la consulta con el primer ROWID  
    //(actualmente en $rowid). 
    $ok = oci_execute($cursor); 
    // Leer el resultado. 
    $línea = oci_fetch_assoc($cursor); 
    echo "{$línea['IDENTIFICADOR']} - {$línea['TEXTO']}<br />"; 
    // Definición de una consulta con parámetros utilizando el ROWID cadena. 
    $consulta = 'SELECT * FROM artículos WHERE ROWID = CHARTOROWID(:p1)'; 
    // Análisis de la consulta. 
    $cursor = oci_parse($conexión,$consulta); 
    // Asociación entre el parámetro y la variable PHP. 
    oci_bind_by_name($cursor,':p1',$rowid_cadena); 
    // Ejecución de la consulta con el primer ROWID  
    //(actualmente en $rowid_cadena). 
    $ok = oci_execute($cursor); 
    // Leer el resultado. 
    $línea = oci_fetch_assoc($cursor); 
    echo "{$línea['IDENTIFICADOR']} - {$línea['TEXTO']}<br />"; 
    // Desconexión. 
    $ok = oci_close($conexión); 
    ?>

    </div>
  </body>
</html>
