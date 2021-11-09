<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Crear un identificador único</title>
    <style type="text/css">
      h1 { font-family: "Courier New",Courier,monospace ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>uniqid()</h1>
    <?php
    echo uniqid(),'<br />';
    echo uniqid(),'<br />';
    echo uniqid('abc'),'<br />';
    echo uniqid('',TRUE) ,'<br />';
    ?>

    <h1>md5()</h1>
    <?php
    echo md5('olivier'),'<br />';
    echo md5(uniqid()),'<br />';
    echo md5(uniqid()),'<br />';
    ?>
    
    <h1>md5(uniqid(rand()))</h1>
    <?php
    echo md5(uniqid(rand())),'<br />';
    echo md5(uniqid(rand())),'<br />';
    ?>
                
    </div>
  </body>
</html>
