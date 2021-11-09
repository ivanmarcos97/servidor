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
// Función que muestra la autenticación HTTP.
function autenticación($mensaje) {
  header("WWW-Authenticate: Basic realm=\"$mensaje\"");
  // Si el usuario hace clic en el botón cancelar,
  // se ejecutan las líneas siguientes (de lo contrario, el script se
  // llama de nuevo, pero con PHP_AUTH_USER rellenado
  // y el script no pasará ya por aquí).
  // Mostrar un mensaje y proponer al usuario 
  // volver a intentarlo.
  include('02-identificacion-http-error.php');
  exit;
}
if (! isset($_SERVER['PHP_AUTH_USER'])) {
  // Ninguna variable PHP_AUTH_USER = primera llamada del script.
  // Solicitud de identificación.
  autenticación('MiSitio.com');
} else {
  // Variable PHP_AUTH_USER existe = llamada después de entrada.
  // Recuperar la información introducida.
  $identificador = $_SERVER['PHP_AUTH_USER'];
  $contraseña = $_SERVER['PHP_AUTH_PW'];
  // Verificar que el usuario existe.
  if (usuario_existe($identificador,$contraseña)) {
    // El usuario existe ...
    // Ir a otra página y detener el script
    header('location: 00-inicio.php');
    exit;
  } else {
    // El usuario no existe...
    // Intentar de nuevo.
    autenticación('MiSitio.com: identificación incorrecta');
  }
}
?>
