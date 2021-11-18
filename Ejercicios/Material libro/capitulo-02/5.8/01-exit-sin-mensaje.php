<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>exit (sin mensaje)</title>
  </head>
  <body>
    <div>
    
    <?php
 	$nombre = '';
	// Generar el principio de la página.
    echo '¡Hola ';
    // No se ha verificado una condición, se interrumpe el script.
    if ($nombre == NULL) {
      exit(1);  // sin mensaje ...
    }
    // Continuar generando la página.
    echo $nombre;
    ?>
    
    </div>
  </body>
</html>

