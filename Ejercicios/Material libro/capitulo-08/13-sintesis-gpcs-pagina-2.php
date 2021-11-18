<?php
// Abrir una sesión y registrar una información de
// sesión llamada "x" de valor "SESIÓN".
session_start();
$_SESSION['x'] = 'SESIÓN';
// Depositar una cookie llamada "x" de valor "COOKIE".
setcookie('x','COOKIE');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Página 2</title>
  </head>
  <body>
    <div>

    <?php
    // Reactivar la sesión.
    session_start();
    // Mostrar los valores de 'x' a partir de las matrices.
    echo '$_GET[\'x\'] = ',
         isset($_GET['x'])?$_GET['x']:'','<br />';
    echo '$_POST[\'x\'] = ',
         isset($_POST['x'])?$_POST['x']:'','<br />';
    echo '$_COOKIE[\'x\'] = ',
         isset($_COOKIE['x'])?$_COOKIE['x']:'','<br />';
    echo '$_SESSION[\'x\'] = ',
         isset($_SESSION['x'])?$_SESSION['x']:'','<br />';
    echo '$_REQUEST[\'x\'] = ',
         isset($_REQUEST['x'])?$_REQUEST['x']:'','<br />';
    ?>

    </div>
  </body>
</html>
