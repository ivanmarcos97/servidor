<?php
// Abrir/reactivar la sesión.
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Página 3</title>
  </head>
  <body>
    <div>
    <b>Página 3</b><br />
    <?php 
    echo '¡Hola ',$_SESSION['nombre'],'<br />';
    echo 'session_id = ',session_id(),'<br />';
    ?>
    </div>
  </body>
</html>
