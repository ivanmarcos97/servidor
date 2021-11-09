<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Construir una consulta</title>
  </head>
  <body>
    <div>

    <?php
    // Incluir un archivo que contiene las diferentes funciones
    // generales.
    require('../../include/funciones.inc.php');
    // Las variables contienen valores que provienen de alguna parte ...
    $texto = "Manzana d'api";
    $precio = 10;
    // Construcción de la consulta.
    $consulta = construir_consulta(
      "INSERT INTO artículos(etiqueta,precio) VALUES('%1',%2)",
      $texto,
      $precio);
    echo $consulta;
    ?>

    </div>
  </body>
</html>
