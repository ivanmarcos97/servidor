<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Utilización de filtros (ejemplo 1)</title>
  </head>
  <body>
    <div>

    <?php
    function mostrar($x,$f) { // utilizada para mostrar los resultados
      echo var_export($x,TRUE),' => ',var_export($f,TRUE),'<br />';    
    }
    echo "<b>Filtrar un número entero</b><br />";
    $valores = array('123','abc','1.2',NULL);
    foreach ($valores as $x) {
      mostrar($x,filter_var($x,FILTER_VALIDATE_INT));
    }
    echo "<b>+ NULL en lugar de FALSE en caso de error</b><br />";
    $x = 'abc';
    // indicador pasado en opción directamente
    $options = FILTER_NULL_ON_FAILURE;
    mostrar($x,filter_var($x,FILTER_VALIDATE_INT,$options));
    echo "<b>Filtrar un número entero (0-100)</b><br />";
    // options del filtro definidas a través de una matriz asociativa
    $options = 
      array
        (
        'options' => array('min_range' => 0,'max_range' => 100)
        );
    $valores = array('0','100','101');
    foreach ($valores as $x) {
      mostrar($x,filter_var($x,FILTER_VALIDATE_INT,$options));
    }
    echo "<b>+ NULL en lugar de FALSE en caso de error</b><br />";
    // indicador agregado en la matriz de options
    $options = 
      array
        (
        'options' => array('min_range' => 0,'max_range' => 100),
        'flags' => FILTER_NULL_ON_FAILURE
        );
    $x = '101';
      mostrar($x,filter_var($x,FILTER_VALIDATE_INT,$options));
    echo "<b>Filtrar con una expresión regular</b><br />";
    $regexp = '<^[0-9]{2}/[0-9]{2}/[0-9]{4}$>';
    $options = 
      array
        (
        'options' => array('regexp' => $regexp)
        );
    $valores = array('01/01/2007','01/01/07');
    foreach ($valores as $x) {
      mostrar($x,filter_var($x,FILTER_VALIDATE_REGEXP,$options));
    }
    ?>

    </div>
  </body>
</html>
