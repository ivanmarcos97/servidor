﻿<?php
// Llamada a session_start.
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Sesión - Página 2</title>
  </head>
  <body>
    <div>

    <?php
    // Presentación.
    echo '$_SESSION[\'nombre\'] =',
         isset($_SESSION['nombre'])?$_SESSION['nombre']:'',
         '<br />';
    echo '$_SESSION[\'información\'][\'apellido\'] =',
         isset($_SESSION['información']['apellido'])?
                     $_SESSION['información']['apellido']:'',
         '<br />';
    ?>

    </div>
  </body>
</html>
