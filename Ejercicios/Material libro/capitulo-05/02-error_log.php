<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>error_log()</title>
  </head>
  <body>
    <div>

    <?php
    // No se muestran errores en el script.
    error_reporting(0);
    // Lectura de un archivo que no existe.
    $nombre_archivo = '/ruta/hacia/archivo_inexistente';
    if (! readfile($nombre_archivo)) {
       // Escribir un mensaje de error en un archivo de seguimiento 
       // específica  a la aplicación
       error_log("No se puede leer el archivo $nombre_archivo.\n",
                 3,'../log/miAplicacion.log');
       // Visualización de un mensaje para el usuario.
       echo 'No se puede completar su solicitud; ',
            'vuelva a intentarlo más tarde.';
    };
    ?>

    </div>
  </body>
</html>
