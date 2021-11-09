<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Parámetros: declaración del tipo de datos</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>

    <h1>Parámetro de tipo escalar (posible desde la versión 7)</h1>
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

    <h1>Parámetro de tipo matriz (posible antes de la versión 7)</h1>
    <?php
    // Declaración de una función que acepta únicamente un  
    // parámetro de tipo "matriz".
    function tamaño(array $matriz) {
      return count($matriz); 
    }
    // Llamada de esta función una primera vez con un
    // tipo de datos correcto y una segunda vez con un tipo de 
    // datos incorrecto.
    echo 'tamaño([1,2,3]) = ',tamaño([1,2,3]),'<br />';
    echo 'tamaño(NULL) = ',tamaño(NULL),'<br />';
    ?>

    </div>
  </body>
</html>
