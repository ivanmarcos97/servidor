<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Manipular las constantes</title>
    <style type="text/css">
      h1 { font-family: "Courier New",Courier,monospace ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
  <div>

  <h1>defined()</h1>
  <?php
  // Probar si la constante CONSTANTE está definida.
  $ok = defined('CONSTANTE');
  if ($ok) {
    echo 'CONSTANTE está definida.<br />';
  } else {
    echo 'CONSTANTE no está definida.<br />';
  };
  // Definir la constante CONSTANTE
  define('CONSTANTE','valor de CONSTANTE');
  // Probar si la constante CONSTANTE está definida.
  $ok = defined('CONSTANTE');
  if ($ok) {
    echo 'CONSTANTE está definida.<br />';
  } else {
    echo 'CONSTANTE no está definida.<br />';
  };
  ?>

  <h1>constant()</h1>
  <?php
  // Definir el nombre de la constante en una variable.
  $nombreConstante = 'CONSTANTE_2';
  // Definir el valor de la constante.
  define($nombreConstante,'valor de CONSTANTE_2');
  // Mostrar el valor de la constante.
  echo $nombreConstante,' = ',constant($nombreConstante);
  ?>

  </div>
  </body>
</html>
