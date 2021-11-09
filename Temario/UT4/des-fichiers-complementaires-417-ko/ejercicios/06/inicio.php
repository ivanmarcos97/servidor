<?php
include_once('clase.Autor.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <meta charset="utf-8" />
    <title>Inicio</title>
  </head>
  <body>
    <div>
    <?php
    try {
      $autor = new Autor('Olivier Heurtel');
      echo $autor,'<br />';
      echo $autor->format(),'<br />';
      echo $autor->format(Autor::APELLIDO_ENTRE_PARENTESIS),'<br />';
      echo $autor->format(Autor::APELLIDO_ENTRE_COMILLAS),'<br />';
      echo $autor->format('?'),'<br />';
    } catch (Exception $e) {
      printf('<b>Error : %s.</b>',$e->getMessage());
    }
    ?>
    </div>
  </body>
</html>