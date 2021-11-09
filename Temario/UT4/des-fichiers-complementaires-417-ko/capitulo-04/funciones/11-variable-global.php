<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
  'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
  <head>
    <meta http-equiv='Content-type' content='text/html;charset=UTF-8' />
    <title>Variable local / global</title>
  </head>
  <body>
    <div>

    <?php
    // Objetivo: escribir una función que efectúe el producto 
    //            de las variables $x y $y, y que almacene el resultado
    //            en la variable $z.
    // Inicialización de dos variables en el script de llamada. 
    $x = 2;
    $y = 5;
    echo '<b>Caso 1: sin utilización de variables ',
         'globales</b><br />';
    function producto1() {
      // $x y $y están vacías en el interior de la función.
      echo '\$x = $x<br />';
      echo '\$y = $y<br />';
      $z = 0 + $x * $y;
    }
    producto1();
    // $z está vacía en el script principal.
    echo '\$z = $z<br />';
    // Resolución del problema utilizando variables globales:
    // - con la palabra clave clave global para $x y $y
    // - con la matriz $GLOBALS para $z
    echo '<b>Caso 2: utilización de variables globales</b><br />';
    function producto2() {
      global $x, $y;
      echo '\$x = $x<br />';
      echo '\$y = $y<br />';
      $GLOBALS['z'] = 0 + $x * $y;
    }
    producto2();
    echo '\$z = $z<br />';
    ?>
    
    </div>
  </body>
</html>
