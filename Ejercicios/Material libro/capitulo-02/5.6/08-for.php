<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>for (primera sintaxis)</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>Ejemplo 1</h1>
    <?php
    // Utilización de la estructura for para examinar una matriz
    // con índices enteros consecutivos
    // Inicialización de la matriz.
    $colores = array('azul','blanco','rojo');
    $número = 3;
    // Bucle utilizando un índice $i que comienza en 0 ($i = 0) 
    // que se incrementa en una unidad en cada iteración ($i++);
    // el bucle continúa mientras el índice sea inferior al 
    // número de elementos presentes en la matriz ($i < $número).
    for ($i = 0; $i < $número; $i++) {
      echo "$colores[$i]<br />";
    };
    ?>
    
    <h1>Ejemplo 2</h1>
    <?php
    // ¡Todo sucede en la instrucción for!
    for
      (
      // Primera iteración: inicialización de un índice $i a 1
      // y de una variable $total a 0.
      $i = 1,$total = 0;
      // Condición de parada del bucle: $i = 5
      $i <= 5;
      // en cada iteración : incremento de $total con el
      // valor actual de $i y luego almacenado en una matriz del
      // valor actual de $i justo antes de incrementarlo
      $total += $i,$números[] = $i++
      );
    // a la salida del bucle, la matriz contiene la lista de los
    // cinco primeros enteros y la variable $total la suma de los
    // cinco primeros enteros
    // sólo queda visualizar todo esto...
    echo implode($números,'+')."=$total";
    ?>

    </div>
  </body>
</html>

