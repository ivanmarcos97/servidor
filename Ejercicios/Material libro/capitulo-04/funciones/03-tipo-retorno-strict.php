<?php
// Activación del tipo strict.
declare(strict_types=1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Declaración del tipo de datos de retorno (tipo strict)</title>
  </head>
  <body>
    <div>

    <?php
    // Declaración de 2 funciones que devuelven el producto
    // de los 2 parámetros, de las cuales la segunda especifica un tipo
    // de datos "entero" para el valor de retorno.
    function producto1($valor1,$valor2) {
      return $valor1 * $valor2;
    }
    function producto2($valor1,$valor2) : int {
      return $valor1 * $valor2;
    }
    // Llamada de dos funciones con los mismos parámetros
    echo 'producto1(20,1/7) = ',producto1(20,1/7),'<br />';
    echo 'producto2(20,1/7) = ',producto2(20,1/7),'<br />';
    ?>

    </div>
  </body>
</html>
