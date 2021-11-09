<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Llamar a un procedimiento almacenado</title>
  </head>
  <body>
    <div>

    <?php
    // Conexión.
    $conexión = oci_connect('demeter','demeter','diane','UTF8');
    // Inserción utilizando el paquete:
    //    - el procedimiento se llama en un bloque PL/SQL
    $consulta = 'BEGIN pkg_artículos.crear(:p1,:p2,:r1); END;';
    //    - el procedimiento se llama en una instrucción SQL CALL 
    // $consulta = 'CALL pkg_artículos.crear(:p1,:p2,:r1)'; 
    // Análisis.
    $cursor = oci_parse($conexión,$consulta);
    // Asociación parámetros/variables.
    oci_bind_by_name($cursor,':p1',$texto,50);
    oci_bind_by_name($cursor,':p2',$precio,32);
    oci_bind_by_name($cursor,':r1',$identificador,32);
    // Ejecución con determinados valores.
    $texto = 'Manzanas';
    $precio = 10;
    // Sin COMMIT automático de oci_execute (el paquete
    // se carga).
    $ok = oci_execute($cursor,OCI_DEFAULT);
    // Visualización del identificador del nuevo artículo.
    echo "Identificador del nuevo artículo = $identificador.<br />";
    // Recuento utilizando el paquete:
    //    - la función se llama en un bloque PL/SQL
    $consulta = 'BEGIN :r1:= pkg_artículos.contar; END;';
    //    - la función se llama en una instrucción SQL CALL 
    // $consulta = 'CALL pkg_artículos.contar() INTO :r1'; 
    // Análisis.
    $cursor = oci_parse($conexión,$consulta);
    // Asociación parámetros/variables.
    oci_bind_by_name($cursor,':r1',$número,32);
    // Ejecución.
    $ok = oci_execute($cursor,OCI_DEFAULT);
    echo "$número artículo(s) en la base de datos.<br />";
    // Lectura de un artículo utilizando el paquete:
    //    - el procedimiento se llama en un bloque PL/SQL
    $consulta = 'BEGIN pkg_artículos.leer(:p1,:r1); END;';
    //    - el procedimiento se llama en una instrucción SQL CALL
    // $consulta = 'CALL pkg_artículos.leer(:p1,:r1)';
    // Análisis.
    $cursor = oci_parse($conexión,$consulta);
    // Creación de un cursor para el resultado.
    $cursor_resultado = oci_new_cursor($conexión);
    // Asociación parámetros/variables.
    oci_bind_by_name($cursor,':p1',$identificador,32);
    oci_bind_by_name($cursor,':r1',$cursor_resultado,
                    -1,SQLT_RSET );
    // Ejecución con el valor actual de $identificador.
    // => lectura del artículo insertado anteriormente
    $ok = oci_execute($cursor,OCI_DEFAULT);
    // Ejecución del cursor resultado.
    $ok = oci_execute($cursor_resultado,OCI_DEFAULT);
    // Fetch.
    $artículo = oci_fetch_array($cursor_resultado,OCI_ASSOC+OCI_RETURN_NULLS);
    echo "Nuevo: {$artículo['TEXTO']} - {$artículo['PRECIO']}<br />";
    // Lectura de todos los artículos utilizando el paquete:
    //    - el cursor $cursor se puede reutilizar
    //    - por contra, $cursor_resultado es "cerrado": es necesario
    //      volverlo a crear y a asociar.
    oci_free_statement($cursor_resultado); // liberación del primero
    $cursor_resultado = oci_new_cursor($conexión);
    oci_bind_by_name($cursor,':r1',$cursor_resultado,
                    -1,SQLT_RSET);
    // Ejecución con $identificador = 0.
    $identificador = 0;
    $ok = oci_execute($cursor,OCI_DEFAULT);
    // Ejecución del cursor resultado.
    $ok = oci_execute($cursor_resultado,OCI_DEFAULT);
    // Fetch de todas las líneas.
    echo "Lista: <br />";
    while ($artículo = oci_fetch_array($cursor_resultado,
                                      OCI_ASSOC+OCI_RETURN_NULLS)) {
      echo "&nbsp&nbsp {$artículo['TEXTO']} - {$artículo['PRECIO']}<br />";
    }
    ?>

    </div>
  </body>
</html>
