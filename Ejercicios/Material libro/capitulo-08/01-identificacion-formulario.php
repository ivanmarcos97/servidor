<?php
// Inclusión del archivo que contiene las funciones generales.
include('../include/funciones.inc.php');
// Función que verifica que las credenciales de identificación introducidas 
// son correctas.
function usuario_existe($identificador,$contraseña) {
  // Conexión y selección de la base de datos
  $conexión = mysqli_connect('localhost','root');
  mysqli_select_db($conexión,'diane');
  // Definición y ejecución de una consulta preparada.
  $sql  = 'SELECT 1 FROM usuarios ';
  $sql .= 'WHERE identificador = ? AND contraseña = ?';
  $consulta = mysqli_stmt_init($conexión);
  $ok = mysqli_stmt_prepare($consulta,$sql);
  $ok = mysqli_stmt_bind_param
          ($consulta,'ss',$identificador,$contraseña);
  $ok = mysqli_stmt_execute($consulta);
  mysqli_stmt_bind_result($consulta,$existe);
  $ok = mysqli_stmt_fetch($consulta);
  mysqli_stmt_free_result($consulta);
  // La identificación es correcta si la consulta ha devuelto 
  // una línea (el usuario existe y la contraseña 
  // es correcta).
  // Si este es el caso $existe contiene 1, de lo contrario está 
  // vacía. Basta con devolverla como un valor booleano.
  return (bool) $existe;
}
// Inicialización de las variables.
$identificador = '';
$contraseña = '';
$mensaje = '';
// Procesamiento del formulario.
if (isset($_POST['conexión'])) {
   // Recuperar la información introducida.
   $identificador = $_POST['identificador'];
   $contraseña = $_POST['contraseña'];
   // Verificar que el usuario existe.
   if (usuario_existe($identificador,$contraseña)) {
      // El usuario existe ...
      // Ir a otra página y detener 
      // el script.
      header('location: 00-inicio.php');
      exit;
   } else {
      // El usuario no existe...
      // Mostrar un mensaje y proponer de 
      // nuevo la identificación.
      $mensaje = 'Identificación incorrecta. ';
      $mensaje .= 'Volver a intentarlo.';
      // Dejar que el formulario se muestre de nuevo ...
   }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>MiSitio.com - Inicio de sesión</title>
  </head>
  <body>
    <form action="01-identificacion-formulario.php" method="post">
    <table border="0">
    <tr>
      <td align="right">Identificador:</td>
      <td><input type="text" Name="identificador" value=
           "<?php echo hacia_formulario($identificador); ?>" /></td>
    </tr>
    <tr>
      <td align="right">Contraseña:</td>
      <td><input type="password" Name="contraseña" value=
           "<?php echo hacia_formulario($contraseña); ?>" /></td>
    </tr>
    <tr>
      <td></td>
      <td align="right"><input type="submit" name="conexión" 
                         value="Conexión" /></td>
    </tr>
    </table>
    <?php echo $mensaje; ?>
    </form>
  </body>
</html>
