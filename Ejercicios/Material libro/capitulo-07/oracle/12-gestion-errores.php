<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Gestión de los errores</title>
  </head>
  <body>
    <div>

    <?php 
    // Conexión incorrecta. 
    $conexión = oci_connect('demeter','ContraseñaIncorrecta','diane'); 
    $e = oci_error(); // Llamada sin parámetro 
    echo '1: ',($e?"${e['código']} - {$e['mensaje']}":'OK'),'<br />'; 
    // Conexión. 
    $conexión = oci_connect('demeter','demeter','diane'); 
    // Una buena consulta para empezar. 
    $consulta = 'SELECT * FROM artículo'; 
    $cursor = oci_parse($conexión,$consulta); 
    $ok = oci_execute($cursor); 
    $e = oci_error($cursor); 
    echo '<p>2: ',($e?"${e['código']} - {$e['mensaje']}":'OK'),'<br />'; 
    // Error de sintaxis. 
    $consulta = "SELEC ' FROM artículos"; 
    $cursor = oci_parse($conexión,$consulta); 
    $e = oci_error($conexión); // Llamada con el identificador de la conexión 
    echo '<p>3: ',($e?"${e['código']} - {$e['mensaje']}":'OK'),'<br />';
    // Consulta en una tabla que no existe. 
    $consulta = 'SELECT * FROM artículo'; 
    $cursor = oci_parse($conexión,$consulta); 
    $e = oci_error($conexión); // Llamada con el identificador de la conexión 
    echo '<p>4.a: ',($e?"${e['código']} - {$e['mensaje']}":'OK'),'<br />'; 
    $ok = oci_execute($cursor); 
    $e = oci_error($cursor); // Llamada con el identificador de cursor
    echo '4.b: ',($e?"${e['código']} - {$e['mensaje']}":'OK'),'<br />'; 
    // Consulta UPDATE que viola una clave primaria. 
    $consulta = 'UPDATE artículos SET identificador = 1'; 
    $cursor = oci_parse($conexión,$consulta); 
    $ok = oci_execute($cursor); 
    $e = oci_error($cursor); 
    echo '<p>5: ',($e?"${e['código']} - {$e['mensaje']}":'OK'),'<br />'; 
    // Intento de fetch en un resultado incorrecto. 
    $consulta = 'SELECT * FROM artículo'; 
    $cursor = oci_parse($conexión,$consulta); 
    $ok = oci_execute($cursor); 
    $e = oci_error($cursor); 
    echo '<p>6.a: ',($e?"${e['código']} - {$e['mensaje']}":'OK'),'<br />'; 
    $línea = oci_fetch_assoc($cursor); 
    $e = oci_error($cursor); 
    echo '6.b: ',($e?"${e['código']} - {$e['mensaje']}":'OK'),'<br />'; 
    ?>

    </div>
  </body>
</html>
