<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Generar todo el formulario</title>
  </head>
  <body>
    <div>

    <?php
    // Matriz que contiene la descripción del formulario.
    $formulario = array(
      array('Apellido: ','text','apellido','HEURTEL'),
      array('','submit','ok','OK') );
    // Generación del formulario mediante un bucle
    // en la matriz.
    echo '<form action="" method="POST">';
    foreach($formulario as $campo) {
      echo "$campo[0]<input type=\"$campo[1]\" ", 
           "name=\"$campo[2]\" value=\"$campo[3]\" /><br />";
    }
    echo '</form>';
    ?>

    </div>
  </body>
</html>
