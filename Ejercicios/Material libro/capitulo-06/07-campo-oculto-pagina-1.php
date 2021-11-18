<?php
// Inicialización de una variable.
$nombre='Olivier & Xavier';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Campo de formulario oculto - Página 1</title>
  </head>
  <body>
    <div>
    <!-- enlace a la página 2 con un botón de formulario -->
    <form action="07-campo-oculto-pagina-2.php" method="post">
    <!-- la información que se transmite está oculta -->
    <input type="hidden" name="nombre" value="<?= $nombre ?>" />
    <input type="submit" name="pagina2" value="Página 2" />
    </form>
    </div>
  </body>
</html>
