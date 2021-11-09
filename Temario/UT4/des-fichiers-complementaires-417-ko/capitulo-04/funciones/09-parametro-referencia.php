<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Parámetros: pas por referencia</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una función que toma dos parámetros.
    // uno pasado por valor y el otro por referencia.
    function una_función($por_valor,&$por_referencia) {
      // Incremento de dos parámetros.
      $por_valor++;
      $por_referencia++;
      // Visualización de dos parámetros en el interior 
      // de la función.
      echo "\$por_valor = $por_valor<br />";
      echo "\$por_referencia = $por_referencia<br />";
    }
    
    // Inicialización de dos variables.
    $x = 1;
    $y = 1;
    // Visualización de las variables antes de la llamada a la función.
    echo "\$x antes de la llamada = $x<br />";
    echo "\$y antes de la llamada = $y<br />";
    // Llamada de la función utilizando las dos variables como
    // valor de los parámetros.
    una_función($x,$y);
    // Visualización de las variables después de la llamada a la función.
    echo "\$x después de la llamada = $x<br />";
    echo "\$y después de la llamada = $y<br />";
    ?>
    
    </div>
  </body>
</html>
