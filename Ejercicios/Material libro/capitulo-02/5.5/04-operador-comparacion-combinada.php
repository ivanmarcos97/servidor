<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>El operador de comparación combinada</title>
  </head>
  <body>
    <div>
    <?php 
    // Inicialización de tres variables. 
    $a = 1+2+3+4+5+6+7+8+9; 
    $b = 1+3+5+7+9; 
    $c = (9*10)/2; 
    echo "<b>\$a = $a - \$b = $b - \$c = $c </b><br />"; 
    // Comparaciones. 
    echo '$a <=> $b : ',$a <=> $b,'<br />'; 
    echo '$b <=> $a : ',$b <=> $a,'<br />'; 
    echo '$a <=> $c : ',$a <=> $c,'<br />'; 
    // Funciona también con cadenas de caracteres. 
    $a = 'abc'; 
    $b = 'xyz'; 
    echo "<b>\$a = '$a' - \$b = '$b' </b><br />"; 
    // Comparaciones. 
    echo '$a <=> $b : ',$a <=> $b,'<br />'; 
    echo '$b <=> $a : ',$b <=> $a,'<br />'; 
    ?>
    </div>
  </body>
</html>
