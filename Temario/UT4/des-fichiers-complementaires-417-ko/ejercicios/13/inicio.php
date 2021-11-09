<?php
// No mostrar mensajes de error PHP. 
error_reporting(0);
// Conexi�n.
$ok = (bool) ($conexion = oci_connect('demeter','demeter','diane','AL32UTF8')); 
// Ejecuci�n de la consulta de selecci�n.
if ($ok) { 
  // Texto de la consulta.
  $sql = 'SELECT apellido,nombre FROM autores ORDER BY nombre'; 
  // An�lisis de la consulta.
  $ok = (bool) ($consulta = oci_parse($conexion, $sql));  
  // Ejecuci�n de la consulta.  
  if ($ok) {  
    $ok = oci_execute($consulta);  
  }
}
// Recuperaci�n de un eventual mensaje de error.
if (! $ok) {
  if (! $conexion) { // error de conexion
    $error = oci_error()['mensaje'];
  } elseif (! (isset($consulta) and $consulta)) { // error durante el an�lisis
    $error = oci_error($conexion)['mensaje'];
  } else { // error despu�s del an�lisis
    $error = oci_error($consulta)['mensaje'];
  }
  $mensaje = "Error durante la ejecuci�n de la consulta ($error).";
}
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
    <table id="autores">
    <tr><th>Autores</th></tr>
    <?php
    if ($ok) {
      while ($autor = oci_fetch_array($consulta)) {
        echo "<tr><td>{$autor['NOMBRE']} ({$autor['APELLIDO']})</td></tr>";
      }
      $ok = (oci_error($consulta) === FALSE);
      $nombre_autores = oci_num_rows($consulta);
      // En caso de error o si el resultado est� vac�o, preparar un mensaje. 
      if (! $ok) { // error durante la lectura 
        $mensaje = "Error durante la lectura de los autores (resultado parcial)."; 
      } elseif ($nombre_autores == 0) { // ning�n autor 
        $mensaje = 'Ning�n autor en la base.'; 
      } 
    }
    ?>
    </table>
    </div>
    <!-- Mostrar un eventual mensaje. --> 
    <div><?= $mensaje ?? '' ?></div>
    <!-- Enlace para introducir un nuevo autor. --> 
    <p><a href="introducir.php">Introducir un nuevo autor</a></p>
    <script>
    // Ocultar la tabla de autores si est� vac�o.
    if (document.getElementById("autores").rows.length <= 1) 
      { document.getElementById("autores").style.display = "none"; }
    </script>
  </body>
</html>