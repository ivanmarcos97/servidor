<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Utilizar expresiones regulares</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>Cuantificador "codicioso" / no "codicioso"</h1>
    <?php
    $texto = '<a href="http://www.olivier-heurtel.fr/">Autor</a>';
    echo htmlentities($texto),'<br />';
    // Cuantificador codicioso.
    $patrón = '#<a href=(.*)>#';
    preg_match($patrón,$texto,$resultado);
    echo htmlentities($patrón),'<br />';
    echo ' => ',htmlentities($resultado[1]),'<br />';
    // Cuantificador no codicioso.
    $patrón = '#<a href=(.*?)>#';
    preg_match($patrón,$texto,$resultado);
    echo htmlentities($patrón),'<br />';
    echo ' => ',htmlentities($resultado[1]);
    ?>
    
    <h1>Referencias inversas</h1>
    <?php
    $texto = '<persona><apellido>Heurtel</apellido><nombre>Olivier</nombre></persona>';
    $patrón = '#<(nombre|apellido)>(.*?)</\1>#';
    preg_match_all($patrón,$texto,$resultado);
    echo htmlentities($texto),'<br />';
    echo htmlentities($patrón),'<br />';
    echo ' => ',htmlentities($resultado[2][0]),'<br />';
    echo ' => ',htmlentities($resultado[2][1]);
    ?>
    
    <h1>Aserciones</h1>
    <?php
    $texto = '<img src="imagenes/logo.png" alt="Logo" />...<img src="http://misitio.com/imagenes/logo.png" alt="Logo" />';
    echo htmlentities($texto),'<br />';
    $patrón = '#<img(?:.+?)src="(.+?)"#';
    echo htmlentities($patrón),'<br />';
    preg_match_all($patrón,$texto,$resultado);
    echo ' => ',htmlentities($resultado[1][0]),'<br />';
    echo ' => ',htmlentities($resultado[1][1]),'<br />';
    $patrón = '#<img(?:.+?)src="(?=http)(.+?)"#';
    echo htmlentities($patrón),'<br />';
    preg_match_all($patrón,$texto,$resultado);
    echo ' => ',htmlentities($resultado[1][0]),'<br />';
    echo ' => ',htmlentities($resultado[1][1]);
    ?>
    
    <h1>Verificar la estructura de una cadena</h1>
    <?php
    // Verificar que una cadena comienza por una letra y 
    // va seguida de al menos 3 letras o cifras o caracteres 
    // especiales _(#*$).
    $patrón = '/^[a-z][a-z0-9_#*$]{3,}/i';
    // Matriz que contiene las cadenas que se van a probar.
    $cadenas[] = 'A0_#b*1$2'; // OK;
    $cadenas[] = '0_#b*1$2';  // no comienza por una letra;
    $cadenas[] = 'A0_';       // longitud insuficiente;
    $cadenas[] = 'A0_€#';     // carácter no válido;
    // Utilización de preg_match.
    foreach ($cadenas as $cadena) {
      if (preg_match($patrón,$cadena) == 0) {
        echo "$cadena => no OK<br />";
      } else {
        echo "$cadena => OK<br />";
      }
    }
    ?>
    
    <h1>Verificar el formato de una cadena que contiene una fecha</h1>
    <?php
    // Verificar que una cadena tiene una estructura conforme a la
    // de una fecha en formato [D]D/[M]M/AAAA y recuperar los
    // 3 componentes día, mes y año.
    $patrón = '#^([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})$#';
    // Matriz que contiene las cadenas que se van a probar.
    $fechas[] = '21/09/2001'; // OK
    $fechas[] = '1/2/2001';   // OK
    $fechas[]  = '21/09/01';   // año incompleto
    // Utilización de preg_match.
    foreach ($fechas as $fecha) {
      $ok = (preg_match($patrón,$fecha,$resultado) > 0);
      if ($ok) {
        echo "$fecha válida.<br />";
        echo "- día = $resultado[1]<br />";
        echo "- mes = $resultado[2]<br />";
        echo "- año = $resultado[3]<br />";
      } else {
        echo "$fecha no válida.<br />";
      }
    }
    ?>

    <h1>Reorganizar una cadena</h1>
    <?php
    // Utilizar preg_replace para reorganizar una cadena.
    // En la ocurrencia, se trata de transformar una fecha
    // en formato DD/MM/AAAA en una fecha en formato AAAA-MM-DD
    $antes = '17/11/1969';
    $después = preg_replace(
                 '#^([0-9]{2})/([0-9]{2})/([0-9]{4})$#',
                 '$3-$2-$1',
                 $antes);
    echo "$antes => $después";
    ?>
        
    </div>
  </body>
</html>
