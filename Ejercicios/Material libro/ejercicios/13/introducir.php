<?php
// No mostrar mensajes de error PHP. 
error_reporting(0);
// Initializar los variables utilizadas en el formulario.
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
    // Conexión.
    $ok = (bool) ($conexion = oci_connect('demeter','demeter','diane','AL32UTF8')); 
    // Ejecución de la consulta de inserción. 
    if ($ok) {
      // Texto de la consulta.
      $sql = 'INSERT INTO autores(apellido,nombre) VALUES(:p1,:p2)'; 
      // Análisis de la consulta.
      $ok = (bool) ($consulta = oci_parse($conexion,$sql));  
      // Unión de los argumentos. 
      if ($ok) {
        $ok =    oci_bind_by_name($consulta,':p1',$apellido,40)
              && oci_bind_by_name($consulta,':p2',$nombre,40);
      }
      // Ejecución de la consulta.   
      if ($ok) {  
        $ok = oci_execute($consulta);  
      }
    }
    // Recuperación de un eventual mensaje de error.
    if (! $ok) { // error
      if (! $conexion) { // error de conexion
        $error = oci_error()['mensaje'];
      } elseif (! (isset($consulta) and $consulta)) { // error durante el análisis
        $error = oci_error($conexion)['mensaje'];
      } else { // error después del análisis
        $error = oci_error($consulta)['mensaje'];
      }
      $mensaje = "Error durante la ejecución de la consulta ($error).";
    } else { // sin error
      // Mensaje de éxito y reinicialización de las variables.
      $mensaje = "$apellido $nombre guardado correctamente.";
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
      <b>Apellidos y nombre del nuevo autor :</b> 
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