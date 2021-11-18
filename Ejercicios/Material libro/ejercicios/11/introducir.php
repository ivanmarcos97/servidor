<?php
// Initialización de las variables utilizadas en el formulario.
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
    $mensaje = 'Los datos introducidos no son correctos.';
    // Recuperar los valores y prepararlos para mostrarlos en el formulario.
    $apellido = filter_input(INPUT_POST,'apellido',FILTER_SANITIZE_SPECIAL_CHARS);
    $nombre = filter_input(INPUT_POST,'nombre',FILTER_SANITIZE_SPECIAL_CHARS);
  } else {
    $autor = $introducir['apellido'] . " " . $introducir['nombre'];
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
    <div><?= $mensaje ?? $autor ?? '' ?></div>
  </body>
</html>