<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Examinar una matriz</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
  <div>
  <?php
  // Inicialización de una matriz.
  $números = array('cero','uno','dos',
                   'cero' => 0,'uno' => 1,'dos' => 2);
  // Examinar la matriz con la primera sintaxis.
  echo '<h1>Primera sintaxis:</h1>';
  foreach($números as $número) {
    echo "$número<br />";
  }
  // Examinar la matriz con la segunda sintaxis.
  echo '<h1>Segunda sintaxis:</h1>';
  foreach($números as $clave => $número) {
    echo "$clave => $número<br />";
  }
  ?>
  <?php
  // Inicialización de una matriz con dos dimensiones.
  $capitales = [['ESPAÑA','Madrid'],['ITALIA','Roma']];
  // Examinar la matriz con foreach y list.
  echo '<h1>Tercera sintaxis:</h1>';
  foreach ($capitales as list($país,$ciudad)) {
    echo "$país: $ciudad<br />";
  }
  ?>
  </div>
  </body>
</html>
