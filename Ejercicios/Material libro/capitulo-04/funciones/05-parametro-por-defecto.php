<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Parámetros: valor predeterminado</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una constante
    define('UNO',1);
    // Definición de la función producto con valores
    // predeterminados para los parámetros (incluyendo una constante
    // para el primer parámetro y una expresión para el
    // segundo, lo cual es posible desde la versión 5.6).
    function producto($valor1=UNO,$valor2=2*UNO) {
      return $valor1 * $valor2;
    }
    // Llamadas
    // sin parámetros
    echo 'producto() = ',producto(),'<br />';
    // - con un solo parámetro = obligatoriamente el primero
    echo 'producto(3) = ',producto(3),'<br />';
    ?>
    
    </div>
  </body>
</html>
