<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>switch (primera sintaxis)</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>Sin instrucción break</h1>
    <?php
    $nombre = rand(0,1)?'Olivier':NULL;
    switch ($nombre) {
       case NULL:
          echo '¡Hola desconocido! ',
               'Voy a llamarte Olivier.<br />';
          $nombre = 'Olivier';
          // break;
       case 'Olivier':
          echo "¡Hola Maestro $nombre!<br />";
          // break;
       default:
          echo "¡Hola alumno $nombre!<br />";
    }
    ?>

    <h1>Con instrucción break</h1>
    <?php
    $nombre = rand(0,1)?'Olivier':NULL;
    switch ($nombre) {
       case NULL:
          echo '¡Hola desconocido! ',
               'Voy a llamarte Olivier.<br />';
          $nombre = 'Olivier';
          break;
       case 'Olivier':
          echo "¡Hola Maestro $nombre!<br />";
          break;
       default:
          echo "¡Hola alumno $nombre!<br />";
    }
    ?>
    
    </div>
  </body>
</html>

