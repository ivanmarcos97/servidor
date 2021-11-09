<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Variable dinámica</title>
  </head>
  <body>
    <div>

    <?php
    $una_variable = 10;
    $nombre_variable = 'una_variable';
    echo '$una_variable = ',$una_variable,'<br />';
    echo '$nombre_variable = ',$nombre_variable,'<br />';
    echo '$$nombre_variable = ',$$nombre_variable,'<br />';
    ?>
    
    </div>
  </body>
</html>
