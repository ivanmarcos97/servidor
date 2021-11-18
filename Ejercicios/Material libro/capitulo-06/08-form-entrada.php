<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Entrada</title>
  </head>
  <body>
    <div>

    <?php
    // Inclusión de un archivo que contiene las funciones genéricas 
    // (cuya función mostrar_matriz definida en el 
    // Capítulo Funciones y clases)
    include('../include/funciones.inc.php') ;
    mostrar_matriz($_POST,'$_POST:');
    ?>

    </div>
  </body>
</html>
