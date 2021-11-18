<?php
// Declaración de variables que se utilizarán más adelante.
// Esta sección de código PHP no genera salida en la página
// HTML (sin llamada a echo).
$nombre = 'Olivier'; // nombre del usuario
$título_página = 'Ediciones ENI presenta...'; // título de la página
$hoy = date("d/m/Y"); // fecha de hoy
$hora = date("H:i:s"); // hora 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>
    <?php /* mostrar el título */ echo $título_página; ?>
    </title>
  </head>
  <body>
    <p>
    <?php
    /* Mostrar el nombre del usuario.
    ** Las etiquetas en negrita del nombre (<B>) y del salto de línea 
    ** (<br />) están incluidas en la cadena enviada por echo.
    */
    echo "¡Hola <b>$nombre</b>!<br />";
    // Visualización de la fecha y la hora
    echo "Hoy estamos a $hoy; son las $hora.";
    ?>
    </p>
  </body>
</html>
