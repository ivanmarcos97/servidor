<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>restore_error_handler()</title>
  </head>
  <body>
    <div>

    <?php
    // Definir un primer controlador de error.
    function controlador1 ($número,$mensaje) {
       // Muestra un simple mensaje
       echo '=> controlador n° 1<br />';
    }
    // Definir un segundo controlador de error.
    function controlador2 ($número,$mensaje) {
       // Muestra un simple mensaje
       echo '=> controlador n° 2<br />';
    }
    // Definir una función que genera un error.
    function generar_error() {
       // Mostrar un mensaje.
       echo 'Generar un error<br />';
       // Leer un archivo que no existe.
       readfile('/ruta/hacia/archivo_inexistente');
    }
    // Primera secuencia : sin controlador.
    echo '<b>Sin controlador</b><br />';
    generar_error();
    // Segunda secuencia: controlador número 1.
    set_error_handler('controlador1');
    echo '<b>Utilizar el controlador n° 1</b><br />';
    generar_error();
    // Tercera secuencia: controlador número 2.
    set_error_handler('controlador2');
    echo '<b> Utilizar el controlador n° 2</b><br />';
    generar_error();
    // Cuarta secuencia: restaurar el controlador anterior.
    restore_error_handler();
    echo '<b>Primer restore_error_handler()</b><br />';
    generar_error();
    // Quinta secuencia: restaurar el controlador anterior.
    restore_error_handler();
    echo '<b>Segundo restore_error_handler()</b><br />';
    generar_error();
    ?>

    </div>
  </body>
</html>
