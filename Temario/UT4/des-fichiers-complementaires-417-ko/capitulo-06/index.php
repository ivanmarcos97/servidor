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
  $título_página = 'Capítulo 6';
  // Lista de enlaces.
  $enlaces['<1>'] = 'Construir un formulario de forma dinámica';
  $enlaces['01-generar-formulario.php'] = 'Generar todo el formulario';
  $enlaces['02-generar-lista-selecc-unica.php'] = 'Generar una lista de opciones de selección única';
  $enlaces['03-generar-lista-selecc-multiple.php'] = 'Generar una lista de opciones de selección múltiple';
  $enlaces['<2-3>'] = 'Recuperar los datos';
  $enlaces['04-form-entrada-post.htm'] = 'Recuperar los datos de un formulario con $_POST o $_REQUEST';
  $enlaces['05-url-pagina-1.php'] = 'Recuperar los datos de una URL con $_GET o $_REQUEST';
  $enlaces['06-url-especiales-pagina-1.php'] = 'Transmitir caracteres especiales en la URL';
  $enlaces['07-campo-oculto-pagina-1.php'] = 'Pasar información en un campo de formulario oculto';
  $enlaces['08-form-entrada.htm'] = 'Procesamiento de las diferentes zonas de un formulario';
  $enlaces['09-form-entrada-matriz.htm'] = 'Procesamiento de los diferentes campos de un formulario (utilización de una matriz)';
  $enlaces['<5>'] = 'Controlar los datos recuperados';
  $enlaces['10-problema-presentacion.php'] = 'Gestión de problemas de presentación';
  $enlaces['11-gestionar-problemas.php'] = 'Gestión de problemas con los datos introducidos';
  $enlaces['<6>'] = 'Utilización de los filtros';
  $enlaces['12-filtro-ejemplo-1.php'] = 'Utilización de los filtros (ejemplo 1)';
  $enlaces['13-filtro-ejemplo-2.php'] = 'Utilización de los filtros (ejemplo 2)';
  $enlaces['14-filtro-ejemplo-matriz.php'] = 'Utilización de los filtros con una matriz';
  $enlaces['15-filtro-formulario.php'] = 'Utilizar filtros en el procesamiento de un formulario';
  $enlaces['<7>'] = 'Ir a otra página';
  $enlaces['16-ir-a-otra-pagina-simple.php'] = 'Ir a otra página (ejemplo simple)';
  $enlaces['17-ir-a-otra-pagina-ejemplo-1.php'] = 'Ir a otra página (ejemplo 1)';
  $enlaces['18-ir-a-otra-pagina-ejemplo-2.htm'] = 'Ir a otra página (ejemplo 2)';  
  $enlaces['<8>'] = 'Intercambiar un archivo entre el cliente y el servidor';
  $enlaces['19-upload.php'] = 'Enviar un archivo desde el cliente (upload)';
  $enlaces['20-download-formulario.php'] = 'Descargar un archivo desde el servidor (download)';
  $enlaces['21-download-enlace.php'] = 'Descargar un archivo desde el servidor (download)';

}
// Incluir el archivo que mostrará la página.
include('../include/indice-capitulo.inc.php');
?>

