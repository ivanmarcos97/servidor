<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>do ... while</title>
  </head>
  <body>
    <div>
    
    <?php
    // Inicializar dos variables.
    $nombre = 'OLIVIER';
    $longitud = 7;
    // Inicializar un índice.
    $índice = 0;
    // Mientras el índice es inferior a la longitud de la cadena
    do {
      // Mostrar el carácter correspondiente el índice seguido 
      // de un punto.
      echo "$nombre[$índice].";
      // Incrementar el índice
      $índice++;
    } while ($índice < $longitud);
    ?>
    
    </div>
  </body>
</html>

