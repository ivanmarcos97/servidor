<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Generar una lista de opciones de selección múltiple</title>
  </head>
  <body>
    <div>

    <?php
    // Lista de frutas a mostrar en la lista, en 
    // forma de matriz asociativa que da el código de la
    // frutas (clave de la matriz) y el título de la fruta.
    $frutas_del_mercado = array(
      'A' => 'Albaricoques',
      'C' => 'Cerezas',
      'F' => 'Fresas',
      'M' => 'Melocotones',
      '?' => 'No lo sé');
    // Lista de frutas favoritas del usuario, en
    // forma de una matriz que da el código de las frutas en cuestión.
    $frutas_favoritas = array("A","F");
    // Nota: más adelante veremos cómo recuperar
    //            esta información en una base de datos.
    ?>
    <!-- construcción del formulario -->
    <form action="" method="POST">
    Frutas favoritas:<br />
    <select name="frutas[]" multiple size="8">
    <?php
    // Código PHP que genera la parte dinámica del formulario.
    // Examinar la lista que se va a mostrar y recuperar el código
    // y el título.
    foreach($frutas_del_mercado as $código => $título) {
      // Determinar si la linea debe estar seleccionada
      //  - o si el código figura en la lista de frutas
      //    favoritas del usuario => búsqueda de $código
      //    en $frutas_favoritas con la función in_array
      //  - si es el caso, incluir el atributo "selected" en
      //    la etiqueta "option", en caso contrario no incluir nada.
      $selección = 
        in_array($código,$frutas_favoritas)?'selected="selected"':'';
      // Generar la etiqueta "option" con la variable $código para
      // el atributo "value", la variable $selección para 
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
