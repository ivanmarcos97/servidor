<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Acceder a un elemento individual de una matriz</title>
  </head>
  <body>
    <div>
    
    <?php
    $números = array('cero','uno','dos','tres',5 => 'cinco','seis','uno' => 1,'siete',-1 => 'menos uno');
    echo $números[1],'<br />';
    echo $números['uno'],'<br />';
    $ciudades = array('ESPAÑA' => array('Madrid','León','Barcelona'),'ITALIA' => array('Roma','Venecia'));
    echo $ciudades['ESPAÑA'][0],'<br />';
    echo $ciudades['ITALIA'][1],'<br />';
    echo "\$números[1] = $números[1]<br />";
    echo "\$números['uno'] = {$números['uno']}<br />";
    echo "\$ciudades['ESPAÑA'][0] = {$ciudades['ESPAÑA'][0]}<br />";
    ?>

    </div>
  </body>
</html>
