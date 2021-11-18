<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Ejemplo de clase</title>
  </head>
  <body>
    <div>

    <?php
    // Inclusión del archivo que contiene la definición de la 
    // clase usuario presentada anteriormente.
    include('01-clases.inc.php');
    // Instanciación de un objeto.
    $yo = new usuario('Olivier','Heurtel');
    // La variable $yo contiene ya un objeto basado en la 
    // clase usuario. Los métodos son accesibles por el 
    // operador ->.
    // Utilización de los métodos del objeto.
    echo "{$yo->información()} <br/>";
    $yo->idioma('en_US');  // modicifación del idioma
    echo "{$yo->información()} <br/>";
    // Modificación y lectura de un atributo público
    $yo->nombre = strtoupper($yo->nombre);
    echo "$yo->nombre <br />";
    // Visualización directa del objeto => utilización de __toString
    echo "$yo <br />";
    // Llamada de un método en la instanciación de un objeto.
    $información = (new usuario('Víctor','Hugo'))->información();
    echo "$información <br/>";
    ?>

    </div>
  </body>
</html>
