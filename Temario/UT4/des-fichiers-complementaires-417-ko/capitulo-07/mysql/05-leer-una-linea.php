<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Consulta no preparada: leer línea</title>
  </head>
  <body>
    <div>

    <?php
    // Identificador del artículo que se va a leer.
    $identificador = 1;
    // Conexión y selección de la base
    $conexión = mysqli_connect();
    $ok = mysqli_select_db($conexión,'diane');
    // Ejecución de la consulta de selección.
    $consulta = "SELECT * FROM artículos " .
                "WHERE identificador = $identificador";
    $resultado = mysqli_query($conexión,$consulta);
    // Lectura y visualización del resultado
    $artículo = mysqli_fetch_assoc($resultado);
    echo $artículo['identificador'],' - ',$artículo['texto'],
         ' - ',$artículo['precio'],'<br />';
    // Desconexión.
    $ok = mysqli_close($conexión);
    ?>

    </div>
  </body>
</html>
