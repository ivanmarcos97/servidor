<?php
// Comprobar si es la segunda llamada de la página.
if (! isset($_GET['vuelta'])) {
  // No...
  // Depositar la cookie.
  setcookie('prueba','prueba');
  // Y volver a cargar la página con una información en
  // la URL que indica que este es el segundo pase.
  header('Location: 04-probar-cookie.php?vuelta=1');
  exit;
}
// En caso contrario, dejar que se muestre la página ...
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Comprobar si el equipo acepta las cookies</title>
  </head>
  <body>
    <div>
    <?php
    // Comprobar si la cookie es "efectiva".
    if (isset($_COOKIE['prueba'])) { // sí ...
      echo 'Cookie aceptada';
    } else { // no...
      echo 'Cookie rechazada';
    }
    ?>
    </div>
  </body>
</html>
