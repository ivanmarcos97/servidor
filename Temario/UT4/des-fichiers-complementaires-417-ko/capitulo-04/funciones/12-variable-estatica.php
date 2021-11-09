<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Variable estática</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una función.
    function variable_estática() {
      // Inicialización de una variable estática.
      static $variable_estática = 0;
      // Inicialización de otra variable.
      $otra_variable = 0;
      // Visualización de las dos variables.
      echo "\$variable_estática = $variable_estática <br />";
      echo "\$otra_variable = $otra_variable<br />";
      // Incremento de las dos variables.
      $variable_estática++;
      $otra_variable++;
    }
    // Primera llamada de la función
    echo '<b>Primera llamada de la función:</b><br />';
    variable_estática();
    // ...
    // Segunda llamada de la función.
    echo '<b>Segunda llamada de la función:</b><br />';
    variable_estática();
    //...
    // Tercera llamada de la función.
    echo '<b>Tercera llamada de la función:</b><br />';
    variable_estática();
    ?>
    
    </div>
  </body>
</html>
