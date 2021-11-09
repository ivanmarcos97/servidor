<?php 
// Abrir/reactivar la sesión. 
session_start(); 
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
    // Mostrar los datos de la sesión. 
    echo 'nombre = ',$_SESSION['nombre'],'<br />'; 
    // Modificar los datos de la sesión. 
    $_SESSION['nombre'] = '?'; 
    // Cancelar la sesión. 
    session_abort(); 
    // Mostrar los datos de la sesión. 
    echo 'nombre = ',$_SESSION['nombre'],'<br />'; 
    ?> 
    <a href="06-sesion-cancelar-pagina-3.php">Página 3</a><br /> 
    </div> 
  </body> 
</html>
