<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <meta charset="utf-8" />
    <title>continue - break</title>
  </head>
  <body>
    <div>
    
    <?php 
    $couleurs = array('azul','invisible','blanco','rojo'); 
    for ($i = 0; $i <= 3; $i++) { 
      // Pasar a  la siguiente iteración para  
      // el color "invisible" 
      if ($colores[$i] == 'invisible') { 
        continue; 
      } 
      echo "$colores[$i] "; 
    } 
    echo '<br />'; 
    for ($i = 0; $i <= 3; $i++) { 
      // Interrumpe el bucle en el coulor "invisible" 
      if ($colores[$i] == 'invisible') { 
        break; 
      } 
      echo "$colores[$i] "; 
    } 
    ?>
    
    </div>
  </body>
</html>

