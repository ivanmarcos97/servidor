<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Ejemplos PHP</title>
  </head>
  <body>
    <div>
    <?php
    // Lista de enlaces.
    $enlaces['./capitulo-02/'] = 'Capítulo 2 - Introducción a PHP';
    $enlaces['./capitulo-03/'] = 'Capítulo 3 - Utilizar las funciones de PHP';
    $enlaces['./capitulo-04/'] = 'Capítulo 4 - Escribir funciones y clases PHP';
    $enlaces['./capitulo-05/'] = 'Capítulo 5 - Administrar los errores en un script PHP';
    $enlaces['./capitulo-06/'] = 'Capítulo 6 - Gestión de los formularios y los enlaces';
    $enlaces['./capitulo-07/'] = 'Capítulo 7 - Acceder a las bases de datos';
    $enlaces['./capitulo-08/'] = 'Capítulo 8 - Administrar las sesiones';
    $enlaces['./capitulo-09/'] = 'Capítulo 9 - Enviar un correo electrónico';
    $enlaces['./capitulo-10/'] = 'Capítulo 10 - Anexos';
    // Código JavaScript para la visualización del enlace en otra ventana.
    $onclick="window.open(this.href,'_blank'); return false;";
    // Mostrar una lista de enlaces.
    foreach ($enlaces as $enlace => $título) {
      printf // enlace hacia la página
        (
        "<a href=\"%s\" onclick=\"%s\">%s</a><br />",
        $enlace,
        $onclick,
        $título
        );
    }
    ?>
    </div>
  </body>
</html>
