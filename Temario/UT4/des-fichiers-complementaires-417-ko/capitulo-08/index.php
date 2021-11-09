<?php
// ¿Se llama a la página con el parámetro "fuente" 
// en la URL?
$mostrar_fuente = isset($_GET['fuente']);
if ($mostrar_fuente) {
  // Sí.
  // Se debe mostrar el código fuente de una página.
  $título_página = "Fuente de {$_GET['fuente']}";  
  $fuente = $_GET['fuente'];
} else {
  // No.
  // Se debe mostrar una lista de enlaces.
  $título_página = 'Capítulo 8';
  // Lista de enlaces.
  $enlaces['01-identificacion-formulario.php'] = 'Identificación por formulario';
  $enlaces['02-identificacion-http.php'] = 'Identificación por autenticación HTTP';
  $enlaces['03-cookie-pagina-1.php'] = 'Utilizar cookies';
  $enlaces['04-probar-cookie.php'] = 'Comprobar si un equipo acepta las cookies';
  $enlaces['05-sesion-data-pagina-1.php'] = 'Manipular los datos guardados en una sesión';
  $enlaces['06-sesion-cancelar-pagina-1.php'] = 'Cancelar una sesión';
  $enlaces['07-sesion-reiniciar-pagina-1.php'] = 'Reiniciar una sesión';
  $enlaces['08-sesion-eliminar-pagina-1.php'] = 'Eliminar una sesión';
  $enlaces['09-sesion-estado.php'] = 'Estado de la sesión';
  $enlaces['10-sesion-principios-pagina-1.php'] = 'Gestionar las sesiones (principios)';
  $enlaces['11-sesion-autenticacion-inicio.php'] = 'Gestionar las sesiones (autenticación)';
  $enlaces['12-personalizar.php'] = 'Conservar información de una visita a otra';
  $enlaces['13-sintesis-gpcs-pagina-1.php'] = 'Pequeño resumen sobre las varibles Get/Post/Cookie/Session';
}
// Incluir el archivo que mostrará la página.
include('../include/indice-capitulo.inc.php');
?>
