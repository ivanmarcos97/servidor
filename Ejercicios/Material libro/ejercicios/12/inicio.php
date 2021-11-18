<?php
// No mostrar mensajes de error PHP. 
error_reporting(0);
// Conexi�n y selecci�n de la base de datos.
$ok = (bool) ($conexion = mysqli_connect()); 
if ($ok) {
  $ok = mysqli_select_db($conexion,'diane');
}
// Ejecuci�n de la consulta de selecci�n.
if ($ok) { 
  // Texto de la consulta.
  $sql = 'SELECT apellido,nombre FROM autores ORDER BY nombre'; 
  // Preparaci�n de la consulta.
  $ok = (bool) ($consulta = mysqli_prepare($conexion, $sql));  
  // Uni�n de las columnas del resultado.  
  if ($ok) {
    $ok = mysqli_stmt_bind_result($consulta,$apellido,$nombre);  
  }
  // Ejecuci�n de la consulta.  
  if ($ok) {  
    $ok = mysqli_stmt_execute($consulta);  
  }
}
// Recuperaci�n de un eventual mensaje de error.
if (! $ok) {
  if (! $conexion) { // error de conexion
    $error = mysqli_connect_error();
  } elseif (! (isset($consulta) and $consulta)) { // error de preparaci�n
    $error = mysqli_error($conexion);
  } else { // error
    $error = mysqli_stmt_error($consulta);
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
      while ($ok = mysqli_stmt_fetch($consulta)) {
        echo "<tr><td>$nombre ($apellido)</td></tr>";
      }
      $nombre_autores = mysqli_stmt_num_rows($consulta);
      // En caso de error o si el resultado est� vac�o, preparar un mensaje. 
      if ($ok === FALSE) { // error durante la lectura 
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