<?php
// Abrir/reactivar la sesión.
session_start();
// Eliminar toda la información de sesión.
$_SESSION = array();
// Eliminar la cookie de la sesión (si se utiliza).
// La cookie lleva el nombre de la variable que almacena 
// el identificador de sesión.
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(),'',time()-1,'/');
}
// Destruir la sesión.
session_destroy();
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
    <b>Página 2</b><br />
    <?php 
    echo '¡Hola ',$_SESSION['nombre'],'<br />';
    echo 'session_id = ',session_id(),'<br />';
    ?>
    <a href="08-sesion-eliminar-pagina-3.php">Página 3</a><br />
    </div>
  </body>
</html>
