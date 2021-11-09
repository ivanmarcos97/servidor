<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Ejemplos de funciones</title>
  </head>
  <body>
    <div>

    <?php
    // Función sin parámetro que muestra "¡Hola!"
    // Ningún valor de retorno
    function mostrar_hola() {
      echo '¡Hola!<br />';
    }
    // Función con 2 parámetros que devuelve el producto
    // de los 2 parámetros.
    function producto($valor1,$valor2) {
      return $valor1 * $valor2;
    }
    // Llamada de la función mostrar_hola
    mostrar_hola();
    // Usos de la función producto:
    // - en una asignación
    $resultado = producto(2,4);
    echo "2 x 4 = $resultado<br />";
    // - en una comparación
    if (producto(10,12) > 100) {
      echo '10 x 12 es superior a 100.<br />';
    }
    // Función con 3 parámetros que devuelve la suma
    // de los 3 parámetros.
    function suma($valor1,$valor2,$valor3) {
      return $valor1 + $valor2 + $valor3;
    }
    // Transformación del contenido de una matriz en 
    // lista de parámetros (apareció en la versión 5.6).
    $valores = [1,2,3];
    echo '1 + 2 + 3 = ',suma(...$valores),'<br />';
    // Los mismo para una parte solo de los parámetros
    // con una matriz definida directamente en la llamada.
    echo '1 + 2 + 4 = ',suma(1,...[2,4]),'<br />';
    // Definición de una función que devuelve una matriz. 
    function qui() {
      return ['Olivier','Heurtel'];
    }
    // Llamada de la función y recuperación directa del nombre almacenado
    // en el índice 0 de la matriz devuelta.
    $nombre = qui()[0];
    echo "qui()[0] = $nombre<br />";
    ?>

    </div>
  </body>
</html>
