<?php
// Activación del tipo strict.
declare(strict_types=1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Parámetros: declaración del tipo de datos (tipo strict)</title>
  </head>
  <body>
    <div>

    <?php
    // Declaración de una función que muestra el valor de sus
    // 2 parámetros, de los cuales el segundo se ha declarado de tipo "entero".
    function mostrar($valor1,int $valor2) {
      echo '$valor1 => ',var_dump($valor1),'<br />';
      echo '$valor2 => ',var_dump($valor2),'<br />';
    }
    // Llamada de la función pasando el mismo valor real
    // a los dos parámetros.
    mostrar(20/7,20/7);
    ?>

    </div>
  </body>
</html>
