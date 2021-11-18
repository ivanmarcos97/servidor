<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>set_error_handler()</title>
  </head>
  <body>
    <div>

    <?php
    // Definir el controlador de errores.
    function controlador_errores
                 ($nivel,$mensaje,$archivo,$línea) {
       // Mostar el archivo correspondiente, con el número de línea.
       echo "Archivo = $archivo<br />";
       echo "Línea   = $línea<br />";
       // Mostrar el nivel y el mensaje.
       echo "Nivel = $nivel <br />";
       echo "Mensaje = $mensaje<br />";
       // Interrumpir el script
       exit;
    }
    // Especificar el controlador que se va a utilizar.
    set_error_handler('controlador_errores');
    // Generar un error.
    readfile('/ruta/hacia/archivo_inexistente');
    // Mostrar un mensaje de fin.
    echo 'Fin';
    ?>

    </div>
  </body>
</html>
