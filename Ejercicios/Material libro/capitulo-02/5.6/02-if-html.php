<?php
// Un poco de aleatoriedad para definir las variables $nombre y $edad.
$nombre = rand(0,1)?'Olivier':NULL;
$edad = rand(0,1)?rand(7,77):NULL;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>if (segunda sintaxis, con incorporación de código HTML)</title>
    <style type="text/css" media="all">
      .ko {font-weight: bold; color: red;}
      .ok {font-weight: bold; color: green;}
    </style>
  </head>
  <body>
    <div>
    <?php if ($nombre == NULL) : // condición PHP ?>
       <!-- código HTML -->
       ¡Hola desconocido!<br />
    <?php elseif ($edad == NULL) : // después de la condición ?>
       <!-- código HTML -->
       Conozco tu <span class="ok">nombre</span> 
       pero no tu <span class="ko">edad</span>.<br />
    <?php else : // después de la condición PHP ?>
       <!-- código HTML -->
       Conozco tu <span class="ok">nombre</span> 
       y tu <span class="ok">edad</span>, 
       pero no se lo diré a nadie.<br />
    <?php endif; // fin de la condición PHP ?>
    </div>
  </body>
</html>
