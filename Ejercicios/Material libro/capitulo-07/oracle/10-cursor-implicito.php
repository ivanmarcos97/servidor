<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Leer un cursor implícito (novedad de Oracle 12c)</title>
  </head>
  <body>
    <div>

    <?php
    // Conexión.
    $conexión = oci_connect('demeter','demeter','diane','UTF8');
    // El procedimiento se llama en un bloque PL/SQL.
    $consulta = 'BEGIN leer_cursor_implícito(); END;';
    // Análisis.
    $cursor = oci_parse($conexión,$consulta);
    // Ejecución.
    $ok = oci_execute($cursor,OCI_DEFAULT);
    // Recuperación del cursor implícito.
    $cursor_resultado = oci_get_implicit_resultset($cursor);
    // Fetch de todas las líneas.
    while ($artículo = oci_fetch_array($cursor_resultado,
                                      OCI_ASSOC+OCI_RETURN_NULLS)) {
      echo "{$artículo['TEXTO']} - {$artículo['PRECIO']}<br />";
    }
    ?>

    </div>
  </body>
</html>
