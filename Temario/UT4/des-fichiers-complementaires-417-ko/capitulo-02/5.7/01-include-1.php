<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>include</title>
  </head>
  <body>
    <div>
    
    <?php
    // Inclusión de un archivo
    include('comun.inc');
    // Declaración de una variable $x en el script principal.
    $x = 1;
    // Visualización de la variable $x.
    echo "Valor de \$x en el script principal: $x<br />";
    // Visualización de la variable $y (definida en el archivo 
    // incluido).
    echo "Valor de \$y en el script principal: $y<br />";
    ?>
    
    </div>
  </body>
</html>

