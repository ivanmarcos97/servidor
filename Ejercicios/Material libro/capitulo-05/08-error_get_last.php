<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>error_get_last()</title>
  </head>
  <body>
    <div>

    <?php
    // Generar un error (sin mostrarlo: @...).
    @readfile('/ruta/hacia/archivo_inexistente');
    // Continuar el script.
    echo 'seguido ...<br />';
    // Mostrar la información sobre el último error.
    foreach (error_get_last() as $clave => $valor) {
      echo "$clave => $valor<br />";
    }
    ?>

    </div>
  </body>
</html>
