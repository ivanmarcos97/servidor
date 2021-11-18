<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Parámetros: lista variable de parámetros</title>
    <style type="text/css"> 
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt } 
    </style> 
  </head>
  <body>
    <div>

    <h1> Primer método</h1>  
    <?php
    // Función que acepta un primer parámetro por referencia 
    // y que almacena el producto de los demás parámetros.
    function producto(&$resultado) {
      switch (func_num_args()) {
        case 1: 
          // Un único parámetro (la variable para el resultado)
          // Devolver 0 (elección arbitraria).
          $resultado = 0;
          break;
        default: 
          // Recuperar los parámetros en una matriz
          // y eliminar el primer elemento (el primer
          // parámetro).
          $parámetros = func_get_args();
          unset($parámetros[0]);
          // Inicializar el resultado en 1
          $resultado = 1;
          // Hacer un bucle en la matriz de parámetros
          // para multiplicar el resultado por el parámetro.
          foreach($parámetros as $parámetro) {
            $resultado *= $parámetro;
          }
          break;
      }
    }
    // llamadas
    producto($resultado);
    echo 'producto($resultado) => ',$resultado,'<br />';
    producto($resultado,1,2,3);
    echo 'producto($resultado,1,2,3) => ',$resultado,'<br />';
    ?>

    <h1>Segundo método</h1>  
    <?php
    // Función que acepta un primer parámetro por referencia 
    // y que almacena la suma de todos los demás parámetros.
    function suma(&$resultado,...$valores) {
      $resultado = 0;
      foreach ($valores as $valor) {
        $resultado += $valor;
      }
    }
    // llamadas
    suma($resultado);
    echo 'suma($resultado) => ',$resultado,'<br />';
    suma($resultado,1,2,3,4);
    echo 'suma($resultado,1,2,3,4) => ',$resultado,'<br />';
    $valores = [1,2,4,8];
    suma($resultado,...$valores);
    echo 'suma($resultado,...[1,2,4,8]) => ',$resultado,'<br />';
    ?>
    
    </div>
  </body>
</html>
