<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Actualización</title>
  </head>
  <body>
    <div>

    <?php 
    // Definición de una pequeña función para mostrar la lista 
    // de artículos. 
    // Esta función utiliza un cursor que solo se analizará
    // una vez, durante la primera llamada.
    // La variable que almacena el identificador del cursor es una 
    // variable estática cuyo valor se conserva de una llamada 
    // a otra.
    function mostrar_artículos ($conexión) { 
      static $cursor;
      if (! isset($cursor)) { // $cursor no definido = primera llamada
        $consulta = 'SELECT * FROM artículo'; 
        $cursor = oci_parse($conexión,$consulta); 
      }
      $ok = oci_execute($cursor); 
      echo '<b>Lista de artículos:</b><br />'; 
      while ($artículo = oci_fetch_assoc($cursor)) {
          echo $artículo['IDENTIFICADOR'],' - ',$artículo['TEXTO'],' - ',
               $artículo['PRECIO'],'<br />'; 
      }
    } 
    // Conexión. 
    $conexión = oci_connect('demeter','demeter','diane'); 
    // Visualización de control. 
    mostrar_artículos($conexión); 
    // Consulta INSERT (con parámetros). 
    $consulta = 'INSERT INTO artículos(texto,precio)  
                VALUES(:p1,:p2) 
                RETURNING identificador, ROWID, ROWIDTOCHAR(ROWID)  
                INTO :r1,:r2,:r3'; 
    // Análisis. 
    $cursor = oci_parse($conexión,$consulta); 
    // Creación de una variable para el rowid. 
    $rowid = oci_new_descriptor($conexión,OCI_D_ROWID); 
    // Asociación entre las variables y los parámetros. 
    oci_bind_by_name($cursor,':p1',$texto,50); 
    oci_bind_by_name($cursor,':p2',$precio,32); 
    oci_bind_by_name($cursor,':r1',$identificador,32); 
    oci_bind_by_name($cursor,':r2',$rowid,-1,SQLT_RDD); 
    oci_bind_by_name($cursor,':r3',$rowid_cadena,32); 
    // Ejecución de la consulta. 
    $texto = 'Pera'; // valor del texto (sin s) 
    $precio = 0; // valor del precio (0 por ahora) 
    $ok = oci_execute($cursor); // COMMIT automático 
    echo "Identificador del nuevo artículo = $identificador.<br />"; 
    echo  
      'ROWID del nuevo artículo = ',gettype($rowid),'<br />'; 
    echo "ROWID del nuevo artículo = $rowid_cadena (cadena).<br />"; 
    // Consulta UPDATE con parámetro utilizando el ROWID objeto. 
    $consulta = 'UPDATE artículos SET precio = :p1  
                WHERE ROWID = :p2'; 
    // Análisis. 
    $cursor = oci_parse($conexión,$consulta); 
    // Asociación entre las variables y los parámetros. 
    oci_bind_by_name($cursor,':p1',$precio,32); 
    oci_bind_by_name($cursor,':p2',$rowid,-1,SQLT_RDD); 
    // Ejecución de la consulta. 
    $precio = 29.9; // valor del precio ($rowid ya inicializado) 
    $ok = oci_execute($cursor); // COMMIT automático 
    // Consulta UPDATE con parámetros utilizando el ROWID cadena. 
    $consulta = 'UPDATE artículos SET texto = :p1  
                WHERE ROWID = CHARTOROWID(:p2)'; 
    // Análisis. 
    $cursor = oci_parse($conexión,$consulta); 
    // Asociación entre las variables y los parámetros. 
    oci_bind_by_name($cursor,':p1',$texto,50); 
    oci_bind_by_name($cursor,':p2',$rowid_cadena,32); 
    // Ejecución de la consulta. 
    $texto = 'Peras'; // valor del texto (con una s) 
                         // $rowid_cadena ya inicializada 
    $ok = oci_execute($cursor); // COMMIT automático 
    // Consulta UPDATE (sin parámetros). 
    $consulta = 'UPDATE artículos SET precio = precio * 1.1  
                WHERE precio < 40'; 
    // Análisis. 
    $cursor = oci_parse($conexión,$consulta); 
    // Ejecución de la consulta. 
    $ok = oci_execute($cursor); // COMMIT automático 
    $número = oci_num_rows($cursor); 
    echo "$número artículo(s) añadido(s).<br />"; 
    // Consulta DELETE (sin parámetros). 
    $consulta = 'DELETE FROM artículos WHERE precio > 40'; 
    // Análisis. 
    $cursor = oci_parse($conexión,$consulta); 
    // Ejecución de la consulta. 
    $ok = oci_execute($cursor); // COMMIT automático 
    $número = oci_num_rows($cursor); 
    echo "$número artículo(s) eliminado(s).<br />"; 
    // Visualización de control. 
    mostrar_artículos($conexión); 
    // Desconexión. 
    $ok = oci_close($conexión); 
    ?>

    </div>
  </body>
</html>
