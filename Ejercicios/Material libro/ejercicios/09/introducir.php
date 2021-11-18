<?php
// Comprobar si el script se llama durante el tratamiento del formulario. 
if (isset($_POST['ok'])) { // sí 
  // Recuperar los valores introducidos en el formulario. 
  $apellido = $_POST['apellido']; 
  $nombre = $_POST['nombre']; 
  $autor = "$apellido $nombre";
} 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <meta charset="utf-8" />
    <title>Introducir datos</title>
    <style>
    label { display: block; width: 60px; float: left; }
    </style>
  </head>
  <body>
    <!-- Formulario de introdución de datos del autor. --> 
    <form action="introducir.php" method="post"> 
    <div> 
      <b>Apellidos y nombre del nuevo autor :</b> 
      <br /><label>Apellido</label>  
      <input type="text" name="apellido" size="40" maxlength="40" autofocus="autofocus" /> 
      <br /><label>Nombre</label>
      <input type="text" name="nombre" size="40" maxlength="40" /> 
      <br /> 
      <input type="submit" name="ok" value="Guardar" /> 
    </div> 
    </form> 
    <div><?= (isset($autor))?$autor:'' ?></div>
  </body>
</html>