<?php
// Abrir/reactivar la sesión.
session_start();
// Guardar dos informaciones en la sesión.
$_SESSION['nombre'] = 'Olivier';
$_SESSION['información'] =  // es una matriz ...
      array('nombre'=>'Olivier','apellido'=>'HEURTEL');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Sesión - Página 1</title>
  </head>
  <body>
    <div><a href="05-sesion-data-pagina-2.php">Página 2</a></div>
  </body>
</html>
