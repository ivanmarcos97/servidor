<?php
// Desactivar la visualización de los errores.
error_reporting(0);
// Leer la lista de los autores desde el archivo.
$autores = file('autores.txt',FILE_IGNORE_NEW_LINES);
// Asignar la variable $ok.
$ok = ($autores !== FALSE);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <meta charset="utf-8" />
    <title>Inicio</title>
    <style>
    table { border-collapse: collapse; }
    table, td, th { border: 1px solid black; }
    td, th { padding: 4px; }
    </style>
  </head>
  <body>
    <div>
    <?php if ($ok): // condición PHP ?> 
    <!-- Mostrar la tabla de autores 
        (solo en caso de éxito). -->
    <table>
    <tr><th>Autores</th></tr>
    <?php
    foreach ($autores as $autor) {
      echo "<tr><td>$autor</td></tr>";
    }
    ?>
    </table>
    <?php else: // consecuencia de la condición PHP ?> 
    <!-- Mostrar un mensaje de error y un enlace. -->
    Error durante la lectura de la lista de los autores.<br />
    <a href="inicio-1.php">Intentar de nuevo</a>
    <?php endif; // fin de la condición PHP ?> 
    </div>
  </body>
</html>