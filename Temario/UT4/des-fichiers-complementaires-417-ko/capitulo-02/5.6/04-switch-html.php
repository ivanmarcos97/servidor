<?php
$idioma = 'es';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>switch (segunda sintaxis, con incorporación de código HTML)</title>
    <style type="text/css" media="all">
    .en {font-weight: bold; color: green;}
    .es {font-weight: bold; color: orange;}
    .fr {font-weight: bold; color: blue;}
    .desconocido {font-weight: bold; color: red;}
    </style>
  </head>
  <body>
    <div>
    <?php switch ($idioma): // switch
            case 'en':      // primer case 
    ?>
       <!-- código HTML -->
       Hello <span class="en">my friend</span>!<br />
    <?php   break;           // break primer case ?>
    <?php   case 'es':      // segundo case ?>
       <!-- código HTML -->
       ¡Buenos días <span class="es">amigo</span>!<br />
    <?php   break;           // break segundo case ?>
    <?php   case 'fr':      // tercer case ?>
       <!-- código HTML -->
       Salut <span class="fr">mon pote</span> !<br />
    <?php   break;           // break tercer case ?>
    <?php   default:        // predeterminado ?>
       <!-- código HTML -->
       <span class="desconocido">?????</span>
    <?php endswitch;         // fin del switch ?>
    </div>
  </body>
</html>
