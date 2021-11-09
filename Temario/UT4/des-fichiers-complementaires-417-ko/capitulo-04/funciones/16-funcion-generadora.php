<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Funciones de generador</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>

    <h1>Generación de una lista de valores</h1> 
    <?php
    // definición de una función que genera números aleatorios
    function lanzador_de_dados($número=3) {
      for ($i = 1; $i <= $número; $i++) {
        yield rand(1,6);
      }
    }
    // llamada de la función en una variable
    $valores = lanzador_de_dados();
    // dump de la variable (para ver)
    echo '<b>Dump de la variable:</b><br />'; 
    var_dump($valores);
    echo '<b>  // es un </b><br />';
    // exploración de los valores
    echo '<b>Exploración de los valores:</b><br />'; 
    foreach ($valores as $valor) {
      echo "$valor ";
    }
    echo '<br />';
    // nueva llamada (con 5 valores) y exploración directamente
    // en la estructura foreach
    echo '<b>Nueva generación (5 valores):</b><br />'; 
    foreach (lanzador_de_dados(5) as $valor) {
      echo "$valor ";
    }
    ?>
    
    <h1>Generación de una lista de pares clave/valor</h1> 
    <?php
    // definición de una función que proporciona una delas letras de un
    // texto utilizando el código ASCII de la letra como índice
    function letras($texto) {
      for ($i = 0; $i < strlen($texto); $i++) {
        yield ord($texto[$i]) => $texto[$i];
      }
    }
    foreach (letras('OLIVIER') as $código => $letra) {
      echo "$letra ($código) ";
    }
    ?>

    <h1>Devolución de una expresión</h1> 
    <?php
    // definición de una función que genera un número aleatorio de 
    // múltiples de 2 y que devuelve el número de valores generados
    function múltiplo() {
      $n = rand(1,10);
      for ($i = 0; $i < $n; $i++) {        
        yield 2**$i;
      }
      return $n;
    }
    // llamada del generador en una variable (objeto) para poder 
    // a continuación llamar al método getReturn()
    $múltiplo = múltiplo();
    foreach ($múltiplo as $valor) {
      echo "$valor ";
    }
    echo '<br />Número de valores generados = ',$múltiplo->getReturn();
    ?>

    <h1>Delegación del generador</h1> 
    <?php
    // definición de una función que genera números impares
    function impar() {
      for ($i = 0; $i < 5; $i++) {        
        yield 2*$i+1;
      }
    }
    // definición de una función que genera números impares
    // seguidos de números pares
    function números() {
      yield from impar();  // delegación a otro generador
      yield from [2,4,6,8]; // delegación a una matriz
    }
    // llamada del generador de números
    foreach (números() as $valor) {
      echo "$valor ";
    }
    ?>

    </div>
  </body>
</html>
