<?php
// No mostrar mensajes de error PHP. 
error_reporting(0);
// Apertura de la base de datos y gesti�n de una eventual excepci�n.
try 
{
  $conexion = new SQLite3('/app/sqlite/diane.dbf');
  $ok = TRUE;
} catch (Exception $e) {
  $ok = FALSE;
}
// Ejecuci�n de la consulta de selecci�n.
if ($ok) { 
  // Texto de la consulta.
  $sql = 'SELECT apellido,nombre FROM autores ORDER BY nombre'; 
  // Preparaci�n de la consulta.
  $ok = (bool) ($consulta = $conexion->prepare($sql));    
  // Ejecuci�n de la consulta.  
  if ($ok) {  
    $ok = (bool) ($resultado = $consulta->execute());   
  }
}
// Rrecuperaci�n de un eventual mensaje de error.
if (! $ok) {
  if (! $conexion) { // error de conexion
    $error = $e->getMessage();
  } else { // error
    $error = $conexion->lastErrorMsg();
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
      $nombre_autores = 0;
      while ($autor = $resultado->fetchArray()) {
        $nombre_autores++;
        echo "<tr><td>{$autor['nombre']} ({$autor['apellido']})</td></tr>";
      }
      // En caso de error o si el resultado est� vac�o, preparar un mensaje. 
      if (! in_array($conexion->lastErrorCode(),[0,100,101])) { // error durante la lectura 
        $mensaje = "Erreur durante la lectura de los autores (resultado parcial)."; 
      } elseif ($nombre_autores == 0) { // ning�n autor 
        $mensaje = 'Ning�n autor en la base.'; 
      } 
    }
    ?>
    </table>
    </div>
    <!-- Mostrar de un eventual mensaje. --> 
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