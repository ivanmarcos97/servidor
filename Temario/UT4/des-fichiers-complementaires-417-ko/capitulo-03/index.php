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
  $título_página = 'Capítulo 3';
  // Lista de enlaces.
  $enlaces['01-constantes-funciones.php'] = 'Manipular las constantes';
  $enlaces['02-variables-funciones.php'] = 'Manipular les variables';
  $enlaces['03-tipos-funciones.php'] = 'Manipular los tipos de datos';
  $enlaces['04-matrices-funciones.php'] = 'Manipular las matrices';
  $enlaces['05-numeros-funciones.php'] = 'Manipular los números';
  $enlaces['06-cadenas-funciones.php'] = 'Manipular las cadenas de caracteres';
  $enlaces['07-expresiones-regulares.php'] = 'Utilizar las expresiones regulares';
  $enlaces['08-fechas-funciones.php'] = 'Manipular las fechas';
  $enlaces['09-identificador-unico.php'] = 'Generar un identificador único';
  $enlaces['10-manipular-archivos.php'] = 'Manipular los archivos en el servidor';
}
// Incluir el archivo que mostrará la página.
include('../include/indice-capitulo.inc.php');
?>
