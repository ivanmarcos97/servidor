<?php
// Inicializar dos variables.
$número = 0;
$numero = 5;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>for (segunda sintaxis, con incorporación de código HTML)</title>
  </head>
  <body>
    <form action="">
       <div>
       Indique sus cinco competencias principales:<br />
       <?php // bucle PHP
       for($número = 1; $número <= $numero; $número++):
       ?>
          <!-- código HTML -->
          <input type="text" /><br />
       <?php endfor; // fin del bucle PHP ?>
       <input type="submit" value = "OK" /><br />
       </div>
    </form>
  </body>
</html>
