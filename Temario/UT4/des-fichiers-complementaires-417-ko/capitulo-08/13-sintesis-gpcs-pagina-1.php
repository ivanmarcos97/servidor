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
    <title>Página 1</title>
  </head>
  <body>
    <!-- En un formulario, poner una variable dada 
         llamada "x" de valor "GET" en la URL del 
         atributo "action" -->
    <form action="13-sintesis-gpcs-pagina-2.php?x=GET" method="post">
    <!-- Incluir también un campo llamado "x" de 
         valor "POST" -->
    <input type="hidden" name="x" value="POST" />
    <!-- Más un botón para ir a la página 2 -->
    <input type="submit" name="ok" value="Página 2">
    </form>
  </body>
</html>
