<?php
// Declaración de variables que se utilizarán más adelante.
$nombre = 'Olivier'; // nombre del usuario
$título_página = 'Ediciones ENI presenta...'; // título de la página
$hoy = date("d/m/Y"); // fecha de hoy
$hora = date("H:i:s"); // hora 
// Generación de las etiquetas de apertura del documento HTML.
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" ',
     '"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
echo '<html xmlns="http://www.w3.org/1999/xhtml">';
echo '<head>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
echo "<title>$título_página</title>";
echo '</head>';
echo '<body>';
echo '<p>';
 /* Visualización del nombre del usuario.
 ** Las etiquetas en negrita del nombre (<B>) y del salto de línea 
 ** (<br />) están incluidas en la cadena enviada por echo.
 */
echo "¡Hola <b>$nombre</b>!<br />";
// Mostrar la fecha y la hora.
echo "Hoy estamos a $hoy; son las $hora.";
echo '</p>';
echo '</body>';
echo '</html>';
?>
