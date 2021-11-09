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
  $título_página = 'Capítulo 5';
  // Lista de enlaces.
  $enlaces['01-error_reporting.php'] = 'error_reporting()';
  $enlaces['02-error_log.php'] = 'error_log()';
  $enlaces['03-set_error_handler.php'] = 'set_error_handler()';
  $enlaces['04-restore_error_handler.php'] = 'restore_error_handler()';
  $enlaces['05-set_exception_handler.php'] = 'set_exception_handler()';
  $enlaces['06-restore_exception_handler.php'] = 'restore_exception_handler()';
  $enlaces['07-trigger_error.php'] = 'trigger_error()';
  $enlaces['08-error_get_last.php'] = 'error_get_last()';
  $enlaces['09-error_clear_last.php'] = 'error_clear_last()';
}
// Incluir el archivo que mostrará la página.
include('../include/indice-capitulo.inc.php');
?>

