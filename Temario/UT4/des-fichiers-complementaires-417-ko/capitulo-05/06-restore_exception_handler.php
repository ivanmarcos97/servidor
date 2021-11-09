<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>restore_exception_handler()</title>
  </head>
  <body>
    <div>

    <?php
    // Definir un primer controlador de excepción.
    function controlador1 ($excepción) {
       // Muestra un simple mensaje
       echo '=> controlador n° 1<br />';
    }
    // Definir un segundo controlador de excepción.
    function controlador2 ($excepción) {
       // Muestra un simple mensaje
       echo '=> controlador n° 2<br />';
    }
    // Definir una función que genera un error.
    function generar_error() {
       throw new Exception('¡Error!'); 
    }
    // Definir el controlador número 1.
    set_exception_handler('controlador1');
    // Código ...
    // Definir el controlador número 2.
    set_exception_handler('controlador2');
    // Código que requiere un controlador particular 
    // ...
    // Restaurar el antiguo controlador.
    restore_exception_handler();
    // Generar un error.
    generar_error();
    ?>

    </div>
  </body>
</html>
