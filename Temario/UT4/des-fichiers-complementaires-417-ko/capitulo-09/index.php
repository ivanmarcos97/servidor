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
  $título_página = 'Capítulo 10';
  // Lista de enlaces.
  $enlaces['01-correo-simple.php'] = 'Enviar un correo electrónico simple';
  $enlaces['02-correo-mas-complejo.php'] = 'Enviar un correo electrónico más complejo';
  $enlaces['03-correo-html.php'] = 'Enviar un correo electrónico en formato HTML';
  $enlaces['04-correo-con-aj.php'] = 'Enviar un correo electrónico con archivo adjunto';
}
// Incluir el archivo que mostrará la página.
include('../include/indice-capitulo.inc.php');
?>
