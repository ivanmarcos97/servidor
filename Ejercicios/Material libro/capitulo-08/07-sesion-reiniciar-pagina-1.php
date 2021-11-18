<?php 
// Abrir/reactivar la sesión. 
session_start(); 
// Guardar una información en la sesión. 
$_SESSION['nombre'] = 'Olivier'; 
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Página 1</title>
  </head> 
  <body> 
    <div> 
    <b>Página 1</b><br /> 
    <?php 
    // Mostrar los datos de la sesión. 
    echo 'nombre = ',$_SESSION['nombre'],'<br />'; 
    ?> 
    <a href="07-sesion-reiniciar-pagina-2.php">Página 2</a><br /> 
    </div> 
  </body> 
</html>
