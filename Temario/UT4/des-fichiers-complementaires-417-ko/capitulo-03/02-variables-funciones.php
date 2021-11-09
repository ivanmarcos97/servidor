<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Manipular las variables</title>
    <style type="text/css">
      h1 { font-family: "Courier New",Courier,monospace ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>empty()</h1>
    <?php
    // Prueba de una variable no inicializada.
    $está_vacía = empty($variable_no_definida);
    echo '$variable no inicializada<br />';
    if ($está_vacía) {
      echo '=> $variable está vacía.<br />';
    } else {
      echo '=> $variable no está vacía.<br />';
    }
    // Prueba de una variable que contiene una cadena vacía.
    $variable = '';
    $está_vacía = empty($variable);
    echo '$variable = \'\'<br />';
    if ($está_vacía) {
      echo '=> $variable está vacía.<br />';
    } else {
      echo '=> $variable no está vacía.<br />';
    }
    // Prueba de una variable que contiene una cadena igual a 0.
    $variable = '0';
    $está_vacía = empty($variable);
    echo '$variable = \'',$variable,'\'<br />';
    if ($está_vacía) {
      echo '=> $variable está vacía.<br />';
    } else {
      echo '=> $variable no está vacía.<br />';
    }
    // Prueba de una variable que contiene 0.
    $variable = 0;
    $está_vacía = empty($variable);
    echo '$variable = ',$variable,'<br />';
    if ($está_vacía) {
      echo '=> $variable está vacía.<br />';
    } else {
      echo '=> $variable no está vacía.<br />';
    }
    // Prueba de una variable que contiene una cadena no vacía.
    $variable = 'x';
    $está_vacía = empty($variable);
    echo '$variable = \'',$variable,'\'<br />';
    if ($está_vacía) {
      echo '=> $variable está vacía.<br />';
    } else {
      echo '=> $variable no está vacía.<br />';
    }
    ?>
    
    <h1>isset()</h1>
    <?php
    // Prueba de una variable no inicializada.
    $está_definida = isset($variable_no_definida);
    echo '$variable no inicializada<br />';
    if ($está_definida) {
      echo '=> $variable está definida.<br />';
    } else {
      echo '=> $variable no está definida.<br />';
    }
    // Prueba de una variable que contiene una cadena vacía.
    $variable = '';
    $está_definida = isset($variable);
    echo '$variable = \'\'<br />';
    if ($está_definida) {
      echo '=> $variable está definida.<br />';
    } else {
      echo '=> $variable no está definida.<br />';
    }
    // Prueba de una variable que contiene una cadena igual a 0.
    $variable = '0';
    $está_definida = isset($variable);
    echo '$variable = \'',$variable,'\'<br />';
    if ($está_definida) {
      echo '=> $variable está definida.<br />';
    } else {
      echo '=> $variable no está definida.<br />';
    }
    // Prueba de una variable que contiene 0.
    $variable = 0;
    $está_definida = isset($variable);
    echo '$variable = ',$variable,'<br />';
    if ($está_definida) {
      echo '=> $variable está definida.<br />';
    } else {
      echo '=> $variable no está definida.<br />';
    }
    // Prueba de una variable que contiene una cadena no vacía.
    $variable = 'x';
    $está_definida = isset($variable);
    echo '$variable = \'',$variable,'\'<br />';
    if ($está_definida) {
      echo '=> $variable está definida.<br />';
    } else {
      echo '=> $variable no está definida.<br />';
    }
    ?>
    
    <h1>unset()</h1>
    <?php
    // Definir una variable.
    $variable = 1;
    // Mostrar la variable y probar si está definida.
    $está_definida = isset($variable);
    echo '$variable = ',$variable,'<br />';
    if ($está_definida) {
      echo '=> $variable está definida.<br />';
    } else {
      echo '=> $variable no está definida.<br />';
    }
    // Eliminar la variable.
    unset($variable);
    // Mostrar la variable y probar si está definida.
    $está_definida = isset($variable);
    echo '$variable = ',$variable,'<br />';
    if ($está_definida) {
      echo '=> $variable está definida.<br />';
    } else {
      echo '=> $variable no está definida.<br />';
    }
    ?>
    
    <h1>var_dump()</h1>
    <?php
    // Variable no inicializada.
    var_dump($variable);
    // Variable inicializada con un número entero.
    $variable = 10;
    echo '<br />';
    var_dump($variable);
    // Variable inicializada con un número decimal.
    $variable = 3.14;
    echo '<br />';
    var_dump($variable);
    // Variable inicializada con una cadena.
    $variable = 'abc';
    echo '<br />';
    var_dump($variable);
    ?>

    </div>
  </body>
</html>
