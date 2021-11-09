<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Función variable</title>
  </head>
  <body>
    <div>

    <?php
    // Función que efectúa un producto.
    function producto($valor1,$valor2) {
      return $valor1 * $valor2;
    }
    // Función que efectúa una suma.
    function suma($valor1,$valor2) {
      return $valor1 + $valor2;
    }
    // Función que efectúa un cálculo, el nombre del cálculo
    // ('suma' ou 'producto') se pasa como parámetro.
    function calcular($operación,$valor1,$valor2) {
      // $operación contiene el nombre de la función
      // a ejecutar => llamada $operación().
      return $operación($valor1,$valor2);
    }
    // Utilización de la función calcular.
    echo '3 + 5 = ',calcular('suma',3,5).'<br />';
    echo '3 x 5 = ',calcular('producto',3,5).'<br />';
    
    ?>

    </div>
  </body>
</html>
