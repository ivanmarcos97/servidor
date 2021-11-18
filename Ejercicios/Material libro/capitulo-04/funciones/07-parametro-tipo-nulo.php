<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
  <head>
    <meta charset="utf-8" />
    <title>Argumentos: declaración del tipo de datos (NULL aceptable)</title>
  </head>
  <body>
    <div>

    <?php 
    // Declaración de una función que acepte un 
    // argumento de tipo entero que puede ser NULL.
    function cubo(?int $valor ) { 
      if (is_null($valor)) {
        return NULL;
      } else {
       return $valor ** 3 ;
      } 
    } 
    // Llamadas a la función.
    echo 'cubo(<b>2</b>) => ',var_dump(cubo(2)),'<br />'; 
    echo 'cubo(<b>NULL</b>) => ',var_dump(cubo(NULL)),'<br />';
    echo 'cubo() => ',var_dump(cubo()),'<br />';
    ?>

    </div>
  </body>
</html>
