<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Manipular los números</title>
    <style type="text/css">
      h1 { font-family: "Courier New",Courier,monospace ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>abs()</h1>
    <?php 
    echo 'abs(123) = ',abs(123),'<br />'; 
    echo 'abs(-321) = ',abs(-321); 
    ?>
    
    <h1>ceil()</h1>
    <?php 
    echo 'ceil(123.45) = ',ceil(123.45),'<br />'; 
    echo 'ceil(-123.45) = ',ceil (-123.45); 
    ?>
    
    <h1>floor()</h1>
    <?php 
    echo 'floor(1234.56) = ',floor(1234.56),'<br />'; 
    echo 'floor(-1234.56) = ',floor (-1234.56); 
    ?>
    
    <h1>intdiv()</h1>
    <?php 
    echo 'intdiv(8,3) = ',intdiv(8,3),'<br />'; 
    echo 'intdiv(8.8,3) = ',intdiv(8.8,3); 
    ?>
    
    <h1>max()</h1>
    <?php 
    echo 'max(2**3,3**2,2*3,2+3) = ',max(2**3,3**2,2*3,2+3),'<br />'; 
    echo "max('azul','blanco','rojo') = ",max('azul','blanco','rojo'); 
    ?>

    <h1>min()</h1>
    <?php 
    echo 'min(2**3,3**2,2*3,2+3) = ',min(2**3,3**2,2*3,2+3),'<br />'; 
    echo "min('azul','blanco','rojo') = ",min('azul','blanco','rojo'); 
    ?>

    <h1>rand()</h1>
    <?php
    echo rand().'<br />';
    echo rand().'<br />';
    echo rand(1,100).'<br />';
    echo rand(1,100).'<br />';
    ?>
    
    <h1>round()</h1>
    <?php 
    echo 'round(1.2) = ',round(1.2),'<br />'; 
    echo 'round(1.5) = ',round(1.5),'<br />'; 
    echo 'round(1.9) = ',round(1.9),'<br />'; 
    echo 'round(123.456.2) = ',round(123.456,2),'<br />'; 
    echo 'round(123.456,-2) = ',round(123.456,-2),'<br />'; 
    echo 'round(2.5,0,PHP_ROUND_HALF_UP) = ',
            round(2.5,0,PHP_ROUND_HALF_UP),'<br />'; 
    echo 'round(2.5,0,PHP_ROUND_HALF_DOWN) = ',
            round(2.5,0,PHP_ROUND_HALF_DOWN),'<br />'; 
    echo 'round(2.5,0,PHP_ROUND_HALF_EVEN) = ',
            round(2.5,0,PHP_ROUND_HALF_EVEN),'<br />'; 
    echo 'round(2.5,0,PHP_ROUND_HALF_ODD) = ',
            round(2.5,0,PHP_ROUND_HALF_ODD),'<br />'; 
    ?>    
        
    </div>
  </body>
</html>
