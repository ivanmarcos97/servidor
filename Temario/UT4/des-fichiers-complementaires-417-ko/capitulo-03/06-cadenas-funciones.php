<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Manipular las cadenas de caracteres</title>
    <style type="text/css">
      h1 { font-family: "Courier New",Courier,monospace ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>strlen()</h1>
    <?php
    $x = 'Olivier Heurtel';
    echo "strlen('$x') = ",strlen($x);
    ?>
    
    <h1>strtolower() - strtoupper() - ucfirst() - lcfirst() - ucwords()</h1>
    <?php
    $x = 'OLIVIER HEURTEL';
    $y = 'olivier heurtel';
    echo "strtolower('$x') = ",strtolower($x),'<br />';
    echo "strtoupper('$y') = ",strtoupper($y),'<br />';
    echo "ucfirst('$y') = ",ucfirst($y),'<br />';
    echo "lcfirst('$x') = ",lcfirst($x),'<br />';
    echo "ucwords('$y') = ",ucwords($y),'<br />';
    ?>

    <h1>strcmp() - strcasecmp()</h1>
    <?php
    $x = 'Olivier';
    $y = 'olivier';
    echo "strcmp('$x','$y') = ",strcmp($x,$y),'<br />';
    echo "strcasecmp('$x','$y') = ",strcasecmp($x,$y),'<br />';
    ?>

    <h1>[s]printf()</h1>
    <?php
    echo 'Formato de una fecha: ',
         sprintf('%02d/%02d/%04d',1,1,2001),'<br />';
    echo 'Formato de números: ',
         sprintf('%01.2f - %01.2f',1/3,12345678.9),'<br />';
    echo 'Porcentaje: ',
         sprintf('%01.2f %%',12.3),'<br />';
    echo 'Utilización de opciones de relleno:<br />';
    echo '<tt>'; // fuente no proporcional
    printf("%'.-10s%'.5.2f<br />",'Libros',9.35); // printf direct
    printf("%'.-10s%'.5.2f<br />",'Discos',99.9); // printf direct
    echo '</tt>';
    echo 'Numeración de los argumentos: ',
         sprintf('My name is %2$s, %1$s %2$s.','Olivier','Heurtel'),'<br />';
    ?>
    
    <h1>v[s]printf()</h1>
    <?php
    $datos = array(array('Libros',9.35),array('Discos',99.9));
    echo '<tt>'; // fuente no proporcional
    foreach($datos as $línea) {
      vprintf("%'.-10s%'.5.2f<br />",$línea); // printf direct
    }
    echo "</tt>"; 
    ?>
    
    <h1>number_format()</h1>
    <?php
    $x = 1234.567;
    echo "number_format($x) = ",number_format($x),'<br />';
    echo "number_format($x,1) = ",number_format($x,1),'<br />';
    echo "number_format($x,2,',',' ') = ",
          number_format($x,2,',',' '),'<br />';
    ?>
    
    <h1>ltrim() - rtrim() - trim()</h1>
    <?php
    $x = "\t\t\t x \n\r";
    echo 'strlen($x) = ',strlen($x),'<br />';
    echo 'strlen(ltrim($x)) = ',strlen(ltrim($x)),'<br />';
    echo 'strlen(rtrim($x)) = ',strlen(rtrim($x)),'<br />';
    echo 'strlen(trim($x)) = ',strlen(trim($x)),'<br />';
    $x = '***+-Olivier-+***';
    echo "trim('$x','*+-') = ",trim($x,'*+-'), '<br />';
    ?>

    <h1>substr()</h1>
    <?php
    //    0123456 => para el control
    $x = 'Olivier';
    echo "substr('$x',3) = ",substr($x,3),'<br />';
    echo "substr('$x',3,2) = ",substr($x,3,2),'<br />';
    echo "substr('$x',-4) = ",substr($x,-4),'<br />';
    echo "substr('$x',-4,3) = ",substr($x,-4,3),'<br />';
    ?>
    
    <h1>str_repeat()</h1>
    <?php
    echo str_repeat('abc',3);
    ?>
    
    <h1>strpos() - strrpos() - stripos() - strripos()</h1>
    <?php
    //       0123456789 … => para el control
    $correo = 'contact@olivier-heurtel.fr';
    // strrpos
    $posición = strrpos($correo,'@');
    echo "@ está en la posición $posición en $correo<br />";
    // strpos
    $posición = strpos($correo,'Olivier');
    echo "olivier' está en la posición $posición en $correo<br />";
    // ocurrencia al principio de la cadena
    $posición = strpos($correo,'contact');
    if (! $posición) { // prueba incorrecta: ===
      echo "'contacto' no se encuentra en $correo (<b>¡¡¡prueba incorrecta!!!</b>)<br />";
    } else {
      echo "'contact' está en la posición $posición 
              en $correo<br />";
    }
    if ($posición === FALSE) { // prueba superada: ===
      echo "'contact' no se encuentra en $correo<br />";
    } else {
      echo "'contact' está en la posición $posición 
              en $correo<br />";
    }
    // ocurrencia no encontrada
    $posición = strpos($correo,'información');
    if ($posición === FALSE) { // prueba superada: ===
      echo "'información' no se encuentra en $correo<br />";
    } else {
      echo "'información' está en la posición $posición 
              en $correo<br />";
    }
    ?>
    
    <h1>strstr() - stristr() - strrchr()</h1>
    <?php
    $correo = 'Olivier-Heurtel@olivier-heurtel.fr';
    echo "Resto de $correo comenzando por:<br />";
    // strrchr
    $resto = strrchr($correo,'-');
    echo "- la última ocurrencia de '-'<br />----> $resto <br />";
    // strstr
    $resto = strstr($correo,'olivier');
    echo "- la primera ocurrencia de 'olivier' 
          (sensible a mayúsculas y minúsculas)<br />----> $resto <br />";
    // stristr
    $resto = stristr($correo,'olivier');
    echo "- la primera ocurrencia de 'olivier' 
          (no sensible a mayúsculas y minúsculas)<br />----> $resto <br />";
    echo "Inicio de $correo terminando por:<br />";
    // strstr
    $resto = strstr($correo,'@',TRUE);
    echo "- la primera ocurrencia de '@'<br />----> $resto <br />";
    ?>
    
    <h1>str_replace() - str_ireplace()</h1>
    <?php
    // primera sintaxis
    $x = 'este verano, a la playa';
    $buscar = 'verano';
    $reemplazar = 'invierno';
    echo '<b>Primera sintaxis:</b><br />';
    echo "$buscar => $reemplazar <br />";
    echo "$x => ",str_replace($buscar,$reemplazar,$x),'<br />';
    // segunda sintaxis
    $x = array('este verano, a la playa','el barco azul y verde');
    $buscar = array('verano','playa','azul','verde');
    $reemplazar = array('invierno','montaña','rojo','amarillo');
    echo "<b>Segunda sintaxis:</b><br />";
    foreach($buscar as $índice => $antes)
      { echo "$antes => $reemplazar[$índice]<br />"; }
    // Utilización de la variable $número para recuperar 
    // el número de reemplazos.
    $y = str_replace($buscar,$reemplazar,$x,$número);
    echo "$x[0] => $y[0]<br />";
    echo "$x[1] => $y[1]<br />";
    echo "$número reemplazos<br />";
    ?>
    
    <h1>strtr()</h1>
    <?php
    // Funciones de conversión UTF-8 <=> ISO-8859-15
    function conv($texto) {
      return iconv('UTF-8','ISO-8859-15',$texto);
    } 
    function rconv($texto) {
      return iconv('ISO-8859-15','UTF-8',$texto);
    } 
    // primera sintaxis
    $x = 'este verano, a la playa';
    $antes = 'éèà';
    $después = 'eea';
    echo '<b>Primera sintaxis:</b><br />';
    echo "$antes => $después<br />";
    echo "$x => ",
          rconv(strtr(conv($x),conv($antes),conv($después))),
         '<br />';
    // segunda sintaxis
    $x = 'el barco azul y verde';
    $correspondencia = array('azul'=>'rojo','verde'=>'amarillo');
    echo '<b>Segunda sintaxis:</b><br />';
    foreach($correspondencia as $antes => $después)
      { echo "$antes => $después<br />"; }
    echo "$x => ",strtr($x,$correspondencia),'<br />';
    ?>
        
    </div>
  </body>
</html>
