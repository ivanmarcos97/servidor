<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Generar una lista de opciones de selección única</title>
  </head>
  <body>
    <div>

    <?php
    // Lista de idiomas a mostrar en la lista, en 
    // forma de matriz asociativa que da el código del
    // idioma (clave de la matriz) y el título del idioma.
    $idiomas_disponibles = array(
      'E' => 'Español',
      'F' => 'Francés',
      'I' => 'Italiano');
    // Código del idioma del usuario
    $idioma = 'E';
    ?>
    <!-- construcción del formulario -->
    <form action="entrada.php" method="POST">
    Idioma:<br />
    <select name="idioma">
    <?php
    // Código PHP que genera la parte dinámica del formulario.
    // Examinar la lista que se va a mostrar y recuperar el código
    // y el título.
    foreach($idiomas_disponibles as $código => $título) {
      // Determinar si la linea debe estar seleccionada
      //  - o si el código es igual al código del idioma del 
      //    usuario
      //  - si es el caso, incluir el atributo "selected" en
      //    la etiqueta "option", en caso contrario no incluir nada.
      $selección = ($código == $idioma)?'selected="selected"':'';
      // Generar la etiqueta "option" con la variable $código para
      // la opción "value", la variable $selección para 
      // la indicación de selección y la variable $título 
      // para el texto mostrado en la lista.
      echo "<option value=\"$código\" $selección>$título</option>";
    }
    ?>
    </select>
    </form>

    </div>
  </body>
</html>
