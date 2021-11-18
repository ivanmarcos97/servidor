<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Asignación por referencia</title>
  </head>
  <body>
    <div>
    <?php 
    // Inicialización de una variable. 
    $nombre = 'Olivier'; 
    // Asignación en otra variable por referencia. 
    $patronímico = &$apellido; 
    // Visualización del resultado. 
    echo "<b>Inicialmente:</b><br />"; 
    echo "\$apellido = $apellido<br />"; 
    echo "\$patronímico = $patronímico<br />"; 
    // Modificación de la primera variable. 
    $apellido = 'Heurtel'; 
    // Visualización del resultado. 
    echo "<b>Después de la modificación de \$apellido:</b><br />"; 
    echo "\$apellido = $apellido<br />"; 
    echo "\$patronímico = $patronímico<br />"; 
    ?>
    </div>
  </body>
</html>
