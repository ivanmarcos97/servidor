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
// Inicializar la variable de mensaje (en la forma de una matriz 
// para poder almacenar varios mensajes).
$mensajes = [];
// Conectarse.
$ok = conexión($conexión,$error);
if (! $ok) {
  $mensajes[] = "Error de conexión a la base de datos ($error).";
}
// Procesamiento del formulario.
if ($ok and isset($_POST['ok'])) {
  // Recuperar la matriz que contiene los datos introducidos.
  $líneas = $_POST['entrada'];
  // Limpiar los datos.
  // Para el precio, reemplazar la coma por un punto
  // y eliminar los espacios.
  // En este punto, se deberían comprobar un poco mejor los datos introducidos ...
  // Consejo: el valor de la matriz se recupera por referencia
  //          (&$línea) para poder modificarse directamente.
  foreach($líneas as &$línea) {
    $línea['texto'] = trim($línea['texto']);
    $línea['precio'] = str_replace([',',' '],['.',''],$línea['precio']);
  }
  // Realizar la actualización.
  $ok_maj = guardar_artículos($conexión,$líneas,$error);
  // Definir el mensaje.
  if (is_null($ok_maj)) {
    $mensajes[] = 'No se ha realizado ninguna actualización.';
  } elseif ($ok_maj) {
    $mensajes[] = 'Actualización completada con éxito.';
  } else {
    $mensajes[] = "Error en la actualización ($error).";
  }
}
// Recargar los artículos.
if ($ok) {
  $ok = seleccionar_artículos($conexión,$resultado,$error);
  if (! $ok) {
    $mensajes[] = "Error al cargar los artículos ($error).";
  }
}
// Presentación de la página ...
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Gestión de los artículos</title>
  </head>
  <body>
    <?php if ($ok): ?>
    <!-- si todo está pasado correctamente, crear una tabla HTML  
    ++++ en el interior de un formulario  -->
    <form name="formulario" action="<?= $_SERVER['REQUEST_URI'] ?>" 
          method="post">
    <table border="1" cellpadding="4" cellspacing="0">
    <!-- línea de título -->
    <tr align="center">
    <th>Identificador</th><th>Texto</th><th>Precio</th>
                <th>Eliminar</th>
    </tr>
    <?php
    // Código PHP que genera las líneas de la matriz.
    // Inicializar el contador de líneas.
    $i = 0;
    // Examinar la lista de artículos que se van a mostrar.
    while ($ok = leer_artículo_siguiente($conexión,$resultado,$artículo,$error)) {
      // Incremento del contador de líneas.
      $i++;
      // Cálculo del número de orden en el formulario del
      // campo oculto correspondiente al identificador.
      $n = 4 * ($i - 1);
      // Dar formato a los datos.
      $identificador = $artículo['identificador'];
      $texto = hacia_formulario($artículo['texto']);
      $precio = hacia_formulario(@number_format($artículo['precio'],2,',' ,' '));
      // Generar la línea de la tabla HTML insertando las
      // etiquetas INPUT del formulario.
      printf(
      "<tr><td>%s%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
      $identificador,
      "<input type=\"hidden\" name=\"entrada[$identificador][modificar]\"/>",
      "<input type=\"text\" name=\"entrada[$identificador][texto]\"
        value=\"$texto\" onchange=\"documento.formulario[$n].value=1\" />",
      "<input type=\"text\" name=\"entrada[$identificador][precio]\"
        value=\"$precio\" onchange=\"documento.formulario[$n].value=1\" />",
      "<input type=\"checkbox\" name=\"entrada[$identificador][eliminar]\"
        value=\"$identificador\" />");
    } // while
    // En caso de error o si el resultado está vacío, preparar un mensaje.
    if ($ok === FALSE) { // error en la lectura
      $mensajes[] = "Error en la lectura de los artículos ($error).";
    } elseif ($i == 0) { // ningún artículo
      $mensajes[] = 'Ningún artículo en la base de datos.';
    }
    // Adición de cinco líneas en blanco para la creación
    // (sin identificador, sin casilla de eliminación).
    for($i=1;$i<=5;$i++) {
      printf(
      "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
      "",
      "<input type=\"text\" name=\"entrada[-$i][texto]\" value=\"\" />",
      "<input type=\"text\" name=\"entrada[-$i][precio]\" value=\"\" />",
      "");
    } // for

    ?>    
    </table>
    <p><input type="submit" name="ok" value="Guardar" /></p>
    </form>
    <?php endif; ?>
    <!-- mostrar los posibles mensajes -->
    <div><?= hacia_página(implode("\n",$mensajes)) ?></div>
  </body>
</html>
