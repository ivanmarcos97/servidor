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
  $título_página = 'Capítulo 13';
  // Lista de enlaces.
  $enlaces['01-leer-documento-XML.php'] = 'Leer un documento XML';
  $enlaces['02-generar-PDF.php'] = 'Generar un documento PDF';
  $enlaces['03-generar-imagen.php'] = 'Generar una imagen';
}
// Incluir el archivo que mostrará la página.
include('../include/indice-capitulo.inc.php');
?>
