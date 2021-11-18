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
  $título_página = 'Capítulo 2';
  // Lista de enlaces.
  $enlaces['<2>'] = 'Estructura básica de una página PHP';
  $enlaces['2/01-hola.php'] = 'Mi primera página PHP';
  $enlaces['2/02-echo.php'] = 'Función echo()';
  $enlaces['2/03-php-html.php'] = 'Página que contiene código PHP en varios lugares';
  $enlaces['2/04-php-html.php'] = 'Página generada en su totalidad por código PHP';
  $enlaces['<3>'] = 'Configuración de PHP';
  $enlaces['3/01-phpinfo.php'] = 'Función phpinfo()';
  $enlaces['<5.1-4>'] = 'Constantes - Variables - Tipos de datos - matrices';
  $enlaces['5.1-4/01-constantes.php'] = 'Constantes';
  $enlaces['5.1-4/02-variables.php'] = 'Inicialización y asignación de una variable';
  $enlaces['5.1-4/03-variable-dinamica.php'] = 'Variable dinámica';
  $enlaces['5.1-4/04-conversion-cadena-numero.php'] = 'Conversión de una cadena en un número';
  $enlaces['5.1-4/05-lectura-elemento-matriz.php'] = 'Acceder a un elemento individual de una matriz';
  $enlaces['5.1-4/06-examinar-matriz.php'] = 'Examinar una matriz';
  $enlaces['<5.5>'] = 'Operadores';
  $enlaces['5.5/01-asignacion-por-referencia.php'] = 'Asignación por referencia';
  $enlaces['5.5/02-operador-ternario.php'] = 'El operador ternario';
  $enlaces['5.5/03-operador-union-null.php'] = 'El operador de unión NULL';
  $enlaces['5.5/04-operador-comparacion-combinada.php'] = 'El operador de comparación combinada';
  $enlaces['<5.6>'] = 'Estructuras de control';
  $enlaces['5.6/01-if.php'] = 'if (primera sintaxis)';
  $enlaces['5.6/02-if-html.php'] = 'if (segunda sintaxis, con incorporación de código HTML)';
  $enlaces['5.6/03-switch.php'] = 'switch (primera sintaxis)';
  $enlaces['5.6/04-switch-html.php'] = 'switch (segunda sintaxis, con incorporación de código HTML)';
  $enlaces['5.6/05-while.php'] = 'while (primera sintaxis)';
  $enlaces['5.6/06-while-html.php'] = 'while (segunda sintaxis, con incorporación de código HTML)';
  $enlaces['5.6/07-do-while.php'] = 'do ... while';
  $enlaces['5.6/08-for.php'] = 'for (primera sintaxis)';
  $enlaces['5.6/09-for-html.php'] = 'for (segunda sintaxis, con incorporación de código HTML)';
  $enlaces['<5.7>'] = 'Incluir un archivo';
  $enlaces['5.7/01-include-1.php'] = 'include';
  $enlaces['5.7/02-include-2.php'] = 'include (dos inclusiones de commun.inc)';
  $enlaces['5.7/03-include_once.php'] = 'include_once';
  $enlaces['5.7/04-ejemplo-utilizacion-include.php'] = 'Ejemplo de utilización de include';
  $enlaces['<5.8>'] = 'Interrumpir el script';
  $enlaces['5.8/01-exit-sin-mensaje.php'] = 'exit (sin mensaje)';
  $enlaces['5.8/02-exit-con-mensaje.php'] = 'exit (con mensaje)';
}
// Incluir el archivo que mostrará la página.
include('../include/indice-capitulo.inc.php');
?>
