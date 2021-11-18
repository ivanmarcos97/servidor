<?php
// Leer la lista de los autores desde del archivo.
$autores = file('autores.txt',FILE_IGNORE_NEW_LINES);
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
    <!-- Mostrar la tabla de autores. -->
    <table>
    <tr><th>Autores</th></tr>
    <?php
    foreach ($autores as $autor) {
      echo "<tr><td>$autor</td></tr>";
    }
    ?>
    </table>
    </div>
  </body>
</html>