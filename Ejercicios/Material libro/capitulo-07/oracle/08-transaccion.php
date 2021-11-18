<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Transacción</title>
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
    $consulta = 'INSERT INTO artículos(texto,precio) VALUES(:p1,:p2)'; 
    // Análisis. 
    $cursor = oci_parse($conexión,$consulta); 
    // Creación de una variable para el rowid. 
    $rowid = oci_new_descriptor($conexión,OCI_D_ROWID); 
    // Asociación entre las variables y los parámetros. 
    oci_bind_by_name($cursor,':p1',$texto,50); 
    oci_bind_by_name($cursor,':p2',$precio,32); 
    // Ejecución de la consulta. 
    $texto = 'Plátanos';
    $precio = 15.45;
    $ok = oci_execute($cursor,FALSE); // Sin COMMIT automático
    // Consulta UPDATE con parámetro utilizando el ROWID objeto. 
    $consulta = 'UPDATE artículos SET precio = :p1 WHERE identificador = :p2'; 
    // Análisis. 
    $cursor = oci_parse($conexión,$consulta); 
    // Asociación entre las variables y los parámetros. 
    oci_bind_by_name($cursor,':p1',$precio,32); 
    oci_bind_by_name($cursor,':p2',$identificador,10,SQLT_INT); 
    // Ejecución de la consulta. 
    $identificador = 1;
    $precio = 29.9;
    $ok = oci_execute($cursor,FALSE); // Sin COMMIT automático
    // COMMIT. 
    $ok = oci_commit($conexión); 
    // Consulta DELETE de todos los artículos (¡Ups!). 
    $consulta = 'DELETE FROM artículos'; 
    // Análisis. 
    $cursor = oci_parse($conexión,$consulta); 
    // Ejecución de la consulta. 
    $ok = oci_execute($cursor,FALSE); // Sin COMMIT automático 
    // ROLLBACK (¡Uff!). 
    $ok = oci_rollback($conexión); 
    // Visualización de control. 
    mostrar_artículos($conexión); 
    // Desconexión. 
    $ok = oci_close($conexión); 
    ?>

    </div>
  </body>
</html>
