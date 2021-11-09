<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>error_reporting()</title>
  </head>
  <body>
    <div>

    <?php
    // Valor actual de error_reporting.
    echo '<b>error_reporting = ',error_reporting(),'</b><br />';
    // Por defecto igual a todo excepto E_NOTICE = E_ALL – E_NOTICE.
    echo '= E_ALL - E_NOTICE = ',(E_ALL-E_NOTICE),'<br />';
    // Visualización de una variable no inicializada.
    echo "\$x (no inicializada) = $x => ningún mensaje <br />";
    // Pase de error_reporting a E_ALL (todo).
    error_reporting(E_ALL);
    echo '<b>error_reporting = E_ALL</b><br />';
    // Visualización de una variable no inicializada.
    echo "\$x (no inicializada) = $x => mensaje <br />";
    // Lectura de un archivo que no existe.
    if (! readfile('/ruta/hacia/archivo_inexistente')) {
       echo 'Error en readfile => mensaje<br />';
    };
    // Pase de error_reporting en 0 (nada).
    error_reporting(0);
    echo '<b>error_reporting = 0</b><br />';
    // Lectura de un archivo que no existe.
    if (! readfile('/tmp/infos.txt')) {
       echo 'Error en readfile => más mensaje<br />';
    };
    ?>

    </div>
  </body>
</html>
