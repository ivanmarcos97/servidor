<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>include_once</title>
  </head>
  <body>
    <div>
    
    <?php
    include_once('comun.inc');
    $x = 1;
    echo "Valor de \$x en el script principal: $x<br />";
    echo "Valor de \$y en el script principal: $y<br />";
    include_once('comun.inc');
    ?>
    
    </div>
  </body>
</html>

