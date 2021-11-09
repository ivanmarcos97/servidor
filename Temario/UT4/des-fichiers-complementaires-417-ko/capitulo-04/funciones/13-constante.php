<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
  'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
  <head>
    <meta http-equiv='Content-type' content='text/html;charset=UTF-8' />
    <title>Las constantes y las funciones</title>
  </head>
  <body>
    <div>

    <?php
    // Definición de una constante en el script.
    define('CONSTANTE_SCRIPT','constante script');
    // Definición de una función.
    function constante() {
      // Que define una constante.
      define('CONSTANTE_FUNCIÓN','constante función');
      // Y que muestra una constante del script de llamada.
      echo 'En la función, CONSTANTE_SCRIPT = ',
            CONSTANTE_SCRIPT,'<br />';
    }
    // Llamada de la función.
    constante();
    // Visualización de la constante definida en la función.
    echo 'En el script, CONSTANTE_FUNCIÓN= ',
       CONSTANTE_FUNCIÓN,'<br />';
    ?>
    
    </div>
  </body>
</html>
