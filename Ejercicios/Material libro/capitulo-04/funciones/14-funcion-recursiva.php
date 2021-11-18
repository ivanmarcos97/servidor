<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Ejemplo de función recursiva</title>
  </head>
  <body>
    <div>

    <?php
    function mostrar_matriz($matriz,$título="",$nivel=0) {
      // Parámetros
      //    - $matriz = matriz cuyo contenido se debe mostrar
      //    - $título = título que se debe mostrar sobre el contenido
      //    - $nivel = nivel de visualización
      // Si hay un título, mostrarlo.
      if ($título != "") {
        echo "<br /><b>$título</b><br />";
      }
      // Comprobar si hay datos.
      if (isset($matriz)) { // hay datos
        // Examinar la matriz con parámetros.
        reset ($matriz);
        foreach ($matriz as $clave => $valor) {
          // Mostrar la clave (con sangría función
          // del nivel).
          echo
            str_pad('',12*$nivel, '&nbsp;'),
            htmlentities($clave),' = ';
          // Mostrar el valor
          if (is_array($valor)) { // es una matriz ...
            // incluir una etiqueta <br />
            echo '<br />';
            // Y llamar de manera recursiva a mostrar_matriz para
            // mostrar la matriz en cuestión (sin título y
            // a nivel siguiente para la sangría)
            mostrar_matriz($valor,'',$nivel+1);
          } else { // es un valor escalar
            // Mostrar el valor.
            echo htmlentities($valor),'<br />';
          }
        }
      } else { // sin datos
        // incluir una simple etiqueta <br />
        echo '<br />';
      }
    }
    // Mostrar una matriz de colores.
    $colores = array('Azul','Blanco','Rojo');
    mostrar_matriz($colores,'Colores');
    // Mostrar una matriz de dos dimensiones (país/ciudad).
    $país = array('España' => array('Madrid','León','Barcelona'),
                  'Italia' => array('Roma','Venecia'));
    mostrar_matriz($país,'País/Ciudades');
    ?>
    
    </div>
  </body>
</html>
