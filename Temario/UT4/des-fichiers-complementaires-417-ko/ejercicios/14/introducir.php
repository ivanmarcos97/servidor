<?php
// No mostrar mensajes de error PHP. 
error_reporting(0);
// Inicializar las variables utilizadas en el formulario.
$apellido = '';
$nombre = '';
// Comprobar si el script se llama durante el tratamiento del formulario. 
if (isset($_POST['ok'])) { // sí
  // Utilización de un filtro para garantizar que la entrada es correcta. 
  $filtro = ['filter'  => FILTER_VALIDATE_REGEXP,
             'options' => ['regexp' => '/^[[:alpha:]- ]{1,40}$/u'],
             'flags'   => FILTER_NULL_ON_FAILURE  ];
  // Utilización de este filtro para comprobar el apellido y el nombre.
  $filtros = ['apellido' => $filtro,'nombre' => $filtro];
  $introducir = filter_input_array(INPUT_POST,$filtros);
  // Comprobar el resultado del filtro.
  if (in_array(NULL, $introducir, true)) { // NULL presente = entrada incorrecta
    $ok = FALSE;
    $mensaje = 'Los datos introducidos no son correctos.';
    // Recuperar los valores y prepararlos para mostrarlos en el formulario.
    $apellido = filter_input(INPUT_POST,'apellido',FILTER_SANITIZE_SPECIAL_CHARS);
    $nombre = filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_SPECIAL_CHARS);
  } else {
    $ok = TRUE;
    // Recuperación de los datos introducidos.
    $apellido = trim($introducir['apellido']);
    $nombre = trim($introducir['nombre']);
  }
  // Guardar en la base de datos si todo está OK.
  if ($ok) {
    // Apertura de la base de datos y gestión de una eventual excepción.
    try 
    {
      $conexion = new SQLite3('/app/sqlite/diane.dbf');
      $ok = TRUE;
    } catch (Exception $e) {
      $ok = FALSE;
    }
    // Ejecución de la consulta de inserción. 
    if ($ok) {
      // Texto de la consulta.
      $sql = 'INSERT INTO autores(apellido,nombre) VALUES(?,?)'; 
      // Preparación de la consulta.
      $ok = (bool) ($consulta = $conexion->prepare($sql));    
      // Unión de los argumentos. 
      if ($ok) {
        $ok =    $consulta->bindParam(1,$apellido)
              && $consulta->bindParam(2,$nom);
      }
      // Ejecución de la consulta.   
      if ($ok) {  
        $ok = (bool) $consulta->execute();  
      }
    }
    // Recuperación de un eventual mensaje de error.
    if (! $ok) { // error
      if (! $conexion) { // error de conexión
        $error = $e->getMessage();
      } else { // error
        $error = $conexion->lastErrorMsg();
      }
      $mensaje = "Error durante la ejecución de la consulta ($error).";
    } else { // sin error
      // Mensaje de éxito y reinicialización de las variables.
      $mensaje = "Autor guardado correctamente.";
      $apellido = '';
      $nombre = '';
    }
  }
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
      <b>Apellido y nombre del nuevo autor :</b> 
      <br /><label>Apellido</label>  
      <input type="text" name="apellido" size="40" maxlength="40" 
             value="<?= $apellido ?>" autofocus="autofocus" /> 
      <br /><label>Nombre</label>
      <input type="text" name="nombre" size="40" maxlength="40" 
             value="<?= $nombre ?>" /> 
      <br /> 
      <input type="submit" name="ok" value="Guardar" /> 
    </div> 
    </form> 
    <!-- Mostrar un eventual mensaje. --> 
    <div><?= $mensaje ?? '' ?></div>
    <!-- Enlace para mostrar la lista. --> 
    <p><a href="inicio.php">Mostrar la lista</a></p>
  </body>
</html>