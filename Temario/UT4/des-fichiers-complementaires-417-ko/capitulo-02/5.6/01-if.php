<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>if (primera sintaxis)</title>
  </head>
  <body>
    <div>
    
    <?php
    // Estructura if / elseif / else
    $nombre = 'Olivier';
    $edad = NULL;
    if ($nombre == NULL) {
      echo "¡Hola desconocido!<br />";
    } elseif ($edad == NULL) {
      echo "¡Hola $nombre! No sé tu edad.<br />";
    } else {
      echo "¡Hola $nombre! Tienes $edad años.<br />";
    }
    ?>
    
    </div>
  </body>
</html>

