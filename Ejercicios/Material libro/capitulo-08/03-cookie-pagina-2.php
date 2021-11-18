<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Cookie - Página 2</title>
  </head>
  <body>
    <div>
    <?php
    if ( isset($_COOKIE['nombre']) ) {
      echo "\$_COOKIE['nombre'] = {$_COOKIE['nombre']}<br />";
    } else {
      echo "\$_COOKIE['nombre'] = <br />";
    }
    if ( isset($_COOKIE['apellido']) ) {
      echo "\$_COOKIE['apellido'] = {$_COOKIE['apellido']}<br />";
    } else {
      echo "\$_COOKIE['apellido'] = <br />";
    }
    ?>
    </div>
  </body>
</html>
