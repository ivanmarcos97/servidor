<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>trigger_error()</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>

    <h1>Con un controlador externo</h1>
    <?php
    // Definir el controlador de errores.
    function controlador_errores($nivel,$mensaje) {
       // Mostrar simplemente el nivel y el mensaje.
       echo "Nivel = $nivel <br />";
       echo "Mensaje = $mensaje<br />";
       // No interrumpir el script.
       // exit;
    }
    // Especificar el controlador que se va a utilizar.
    set_error_handler('controlador_errores');
    // generar un error E_USER_NOTICE
    trigger_error('*** mi mensaje ***',E_USER_NOTICE);
    // generar un error E_USER_WARNING
    trigger_error('*** mi mensaje ***',E_USER_WARNING);
    // generar un error E_USER_ERROR
    trigger_error('*** mi mensaje ***',E_USER_ERROR);
    // mostrar un mensaje de fin.
    echo 'Fin';    
    ?>

    <h1>Con el controlador interno</h1>
    <?php
    // Volver a establecer el controlador predeterminado.
    set_error_handler(NULL);
    // generar un error E_USER_NOTICE
    trigger_error('*** mi mensaje ***',E_USER_NOTICE);
    // generar un error E_USER_WARNING
    trigger_error('*** mi mensaje ***',E_USER_WARNING);
    // generar un error E_USER_ERROR
    trigger_error('*** mi mensaje ***',E_USER_ERROR);
    // mostrar un mensaje de fin.
    echo 'Fin';    
    ?>

    </div>
  </body>
</html>
