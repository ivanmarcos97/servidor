<?php
// La primera cookie expira al final de la sesión.
$ok1 = setcookie('nombre','Olivier');
// Segunda cookie expira en 30 días.
$ok2 = setcookie('apellido','HEURTEL',time()+(30*24*3600));
// Resultado.
if ($ok1 and $ok2) {
   $mensaje = 'Cookies depositadas (al menos, a priori)';
} else {
   $mensaje = 'Una de las cookies no se ha podido depositar';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Cookie - Página 1</title>
  </head>
  <body>
    <div>
    <?php echo $mensaje; ?><br />
    <!-- enlace a la página 2 -->
    <a href="03-cookie-pagina-2.php">Página 2</a>
    </div>
  </body>
</html>
