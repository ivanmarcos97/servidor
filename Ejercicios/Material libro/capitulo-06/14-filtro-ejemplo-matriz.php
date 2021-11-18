<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Utilización de filtros con una matriz</title>
  </head>
  <body>
    <div>

    <?php
    function mostrar($x,$f) { // utilizada para mostrar los resultados
      echo var_export($x,TRUE),'<br /> => ',var_export($f,TRUE),'<br />';    
    }
    echo '<b>Filtrar una matriz de números enteros</b><br />';
    $valores = array('123','abc');
    // Mismo filtro a aplicar a todos los datos,
    // sin indicador ni opción.
    mostrar($valores,filter_var_array($valores,FILTER_VALIDATE_INT));
    echo '<b>Filtrar una matriz de datos diferentes (1)</b><br />';
    $valores = array
        (
        'edad' => 123,
        'tamaño' => 'abc',
        'correo' => 'contact@olivier-heurtel.fr'
        );
    // Filtro diferente pero "simple" (sin indicador
    // ni opción) que se aplicará a los datos.
    $filtros = array
        (
        'edad' => FILTER_VALIDATE_INT,
        'tamaño' => FILTER_VALIDATE_INT,
        'correo' => FILTER_VALIDATE_MAIL
        );
    mostrar($valores,filter_var_array($valores,$filtros));
    echo '<b>Filtrar una matriz de datos diferentes (2)</b><br />';
    $valores = array
        (
        'edad' => 123,
        'tamaño' => 'abc',
        'correo' => 'contact@olivier-heurtel.fr'
        );
    // Filtro con opciones e indicador a aplicar a uno
    // de los datos.
    $filtro_edad = array
        (
        'filter' => FILTER_VALIDATE_INT,
        'options' => array('min_range' => 0,'max_range' => 100),
        'flags' => FILTER_NULL_ON_FAILURE
        );
    // Observar la mención de un filtro para un dato
    // que no existe.
    $filtros = array
        (
        'edad' => $filtro_edad,
        'tamaño' => FILTER_VALIDATE_INT,
        'peso' => FILTER_VALIDATE_INT, // no existe
        'correo' => FILTER_VALIDATE_MAIL
        );
    mostrar($valores,filter_var_array($valores,$filtros));
    // Deshabilitar la adición de elementos vacíos.
    echo '<b>Lo mismo desactivando la adición de elementos vacíos</b><br>';
    mostrar($valores,filter_var_array($valores,$filtros,FALSE));
    ?>

    </div>
  </body>
</html>
