<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Gestión de los apóstrofes (problema)</title>
  </head>
  <body>
    <div>

    <?php
    // Datos que plantean el problema.
    $texto = "Manzana d'api";
    $precio = 10;
    // Consulta.
    $consulta = "INSERT INTO artículos(texto,precio)".
               "VALUES('$texto',$precio)";
    echo "$consulta<br />";
    // Ejecución con MySQL.
    echo "<p><b>MySQL</b><br />";
    $conexión = mysqli_connect();
    $ok = mysqli_select_db($conexión,'diane');
    $resultado = mysqli_query($conexión,$consulta);
    echo mysqli_error($conexión),'<br />'; // MySQL no genera ninguna alerta
    // Ejecución con Oracle.
    echo "<p><b>Oracle</b><br />";
    $conexión = oci_connect('demeter','demeter','diane');
    $resultado = oci_execute(oci_parse($conexión,$consulta));
    // Ejecución con SQLite.
    echo "<p><b>SQLite</b><br />";
    $base = new SQLite3('/app/sqlite/diane.dbf');
    $resultado = $base->query($consulta);
    ?>

    </div>
  </body>
</html>
