<?php
include_once('commun.inc.php');
$nombre = 'Olivier';
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
    <?php
    // Mostrar los mensajes
    echo "Hola $nombre.<br />";
    echo 'Bienvenido a ',MI_SITIO,'.<br />';
    // Mostrar la fecha en español.
    setlocale(LC_ALL,'es_ES'); 
    echo 'Hoy es ',strftime('%A %d %B %Y'),'.<br />';  
    // Contar el número de letras del nombre.
    echo 'Su nombre tiene ',strlen($nombre),' letras.<br />';
    // Determinar si el nombre empieza por una vocal o una consonante.
    $vocales = ['A','E','I','O','U','Y'];
    if (in_array(strtoupper($nombre[0]),$vocales)) {
      echo 'Su nombre empieza por una vocal.<br />';
    } else {
      echo 'Su nombre empieza por una consonante.<br />';
    }
    // Contar el número de vocales del nombre.
    $nombre_vocales = preg_match_all('/[AEIOUY]/i',$nombre);
    echo "Su nombre tiene $nombre_vocales vocales.<br />";
    // Mostrar el nombre de autores.
    echo 'Hay ',count($autores),' autores en la lista.<br />';
    // Mostrar mi autor favorito (aleatorio).
    $mi_autor = $autores[rand(0,count($autores)-1)];
    $mi_autor = preg_replace('/(.*) (.*)/','$2 ($1)',$mi_autor);
    echo $mi_autor,' es mi autor favorito.<br />';
    ?>
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