<?php
// Incluir un archivo que contiene las diferentes funciones generales.
require('../../include/funciones.inc.php');
// El número del caso que se va a probar se pasa en la URL con la variable 'prueba'
// Recuperar la valor de la variable (1 por defecto = MySQL).
$prueba = filter_input(INPUT_GET,'prueba',FILTER_VALIDATE_INT)?:1;
switch ($prueba) {
  case 1: // MySQL
  default:
    require('./mysql.inc.php');
    break;
  case 2: // Oracle
    require('./oracle.inc.php');
    break;
  case 3: // SQLite
    require('./sqlite.inc.php');
    break;
}
// Variables que indican si un artículo se debe cargar y/o
// si un artículo se debe guardar.
$cargar_artículo = FALSE;
$guardar_artículo = FALSE;
// Inicializar la variable de mensaje (en la forma de una matriz 
// para poder almacenar varios mensajes).
$mensajes = [];
// Probar si se ha llamado al script en el procesamiento de un formulario.
if (isset($_POST['cargar']) OR isset($_POST['ok'])) { // sí
  // Recuperar el identificador del artículo.
  // Utilización de un filtro para asegurarse de que el valor
  // recuperado es un entero.
  $identificador = filter_input(INPUT_POST,'identificador',FILTER_VALIDATE_INT);
  // falta el identificador o no es válido => mensaje.
  // De lo contrario, determinar la acción que se va a realizar.
  if ($identificador === FALSE OR $identificador === NULL) {
    $mensajes[] = 'Falta el identificador o no es válido.';
  } else {
    $guardar_artículo = isset($_POST['ok']);
    $cargar_artículo = // guardar => recargar
      (isset($_POST['cargar']) OR $guardar_artículo);
  }
}
// Conectarse si es necesario.
if ($cargar_artículo OR $guardar_artículo) {
  $ok = conexión($conexión,$error);
  // En caso de error, se detiene todo.
  if (! $ok) {
    $mensajes[] = "Error de conexión a la base de datos ($error).";
    $cargar_artículo = FALSE;
    $guardar_artículo = FALSE;
  }
}
// Si hay un artículo que guardar ...
if ($guardar_artículo) {
  // Recuperar el contenido del formulario.
  $artículo = $_POST;
  // Eliminar la línea correspondiente al botón Guardar.
  unset($artículo['ok']);
  // Limpiar los datos.
  $artículo['texto'] = trim($artículo['texto']);
  // Para el precio, reemplazar la coma por un punto
  // y eliminar los espacios.
  $artículo['precio'] = str_replace([',',' '],['.',''],$artículo['precio']);
  // En este punto, se deberían comprobar un poco mejor los datos introducidos ...
  // Guardar el artículo.
  $ok = guardar_artículo($conexión,$artículo,$error);
  // Definir el mensaje.
  if ($ok) {
    $mensajes[] = 'Artículo guardado con éxito.';
  } else {
    $mensajes[] = "Error al guardar el artículo ($error).";
  }
}
// Si hay un artículo que cargar ...
if ($cargar_artículo) {
  // Cargar la información en la matriz asociativa $artículo.
  $ok = seleccionar_un_artículo($conexión,$identificador,$artículo,$error);
  // Definir el posible mensaje de error.
  if ($ok) { // ningún error
    if ($artículo) { // hay un artículo
      // Dar formato a los datos.
      $texto = hacia_formulario($artículo['texto']);
      $precio = hacia_formulario(@number_format($artículo['precio'],2,',' ,' '));
    } else { // ningún artículo => mensaje
      $mensajes[] = 'No se ha encontrado ningún artíuclo.';
      unset($artículo);
    }
  } else  { // error
    $mensajes[] = "Error al cargar el artículo ($error).";
    unset($artículo);
  }
}
// Presentación de la página ...
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>',"\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Modificar un artículo</title>
  </head>
  <body>
    <!-- Formulario de publicación del identificador. -->
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
    <div>
    Identificador: 
    <input type="text" name="identificador" size="6" 
       value="<?= $identificador??'' ?>" />
    <input type="submit" name="cargar" value="Cargar" />
    </div>
    </form>
    <?php if (isset($artículo)): ?>
    <!-- Formulario de publicación del artículo (se muestra solo si
         un artículo se ha cargado con éxito) -->
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
    <div>
      <br />Texto: 
      <input type="text" name="texto" size="40" maxlength="40"
       value="<?= $texto ?>" />
      <br />Precio:
      <input type="text" name="precio" size="10" maxlength="10"
       value= "<?= $precio ?>" />
      <input type="hidden" name="identificador" 
       value="<?= $identificador ?>" />
      <br />
      <input type="submit" name="ok" value="Guardar" />
    </div>
    </form>
    <?php endif; ?>
    <!-- mostrar los posibles mensajes -->
    <div><?= hacia_página(implode("\n",$mensajes)) ?></div>
  </body>
</html>
