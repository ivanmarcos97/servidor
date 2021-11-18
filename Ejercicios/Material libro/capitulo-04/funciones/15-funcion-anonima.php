<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Funciones anónimas</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>

    <h1>Función anónima definida en una variable</h1> 
    <?php
    // Definición de una función anónima almacenada en una variable.
    $función_anónima = function ($nombre) {
      echo "¡Hola $nombre!<br />";
    };
    // llamada de la función anónima
    $función_anónima('todo el mundo');
    // Utilización de la función anónima como función de devolución de llamada
    $nombres = array('Olivier','David','Thomas');
    array_walk($nombres,$función_anónima);
    ?>
    
    <h1>Función anónima definida directamente en la llamada</h1> 
    <?php
    $nombres = array('Olivier','David','Thomas');
    array_walk
       (
       $nombres,
       function ($nombre) {echo "¡Hola $nombre!<br />";}
       );
    ?>

    <h1>Importar variables del contexto principal</h1> 
    <?php
    // definición de una variable
    $nombre = 'Olivier';
    // Definición de una función anónima almacenada en una variable.
    // esta función importa la variable $nombre
    $función_anónima = function () use ($nombre) {
      echo "¡Hola $nombre!<br />";
    };
    // llamada de la función anónima
    $función_anónima();
    ?>

    </div>
  </body>
</html>
