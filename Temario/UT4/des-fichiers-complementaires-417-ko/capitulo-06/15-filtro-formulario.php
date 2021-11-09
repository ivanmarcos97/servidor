<?php
// Comprobar si se llama a la página después de la validación del formulario
if (filter_has_var(INPUT_POST, 'ok')) {
  // Definir los filtros para los datos introducidos.
  $filtros =
    array
      (
      'nombre' => array('filter'=> FILTER_SANITIZE_STRING,
                     'flags' => FILTER_FLAG_ENCODE_LOW)
      );
  // Recuperar los datos filtrados.
  $entrada = filter_input_array(INPUT_POST,$filtros);
  $nombre = $entrada['nombre'];
  // El valor introducido se vuelve a mostrar en el formulario y 
  // en la página ...
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Entrada</title>
  </head>
  <body>
    <form action="15-filtro-formulario.php" method="post">
    <div>
      Nombre: 
      <input type="text" name="nombre" 
        value="<?php echo $nombre; ?>" />
      <input type="submit" name="ok" value="OK" /><br />
      <?php echo $nombre; ?>
    </div>
    </form>
  </body>
</html>
