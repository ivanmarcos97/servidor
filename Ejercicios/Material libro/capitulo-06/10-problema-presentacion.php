<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Gestión de los problemas de presentación</title>
    <style type="text/css">
      h1 { font-family: "Courier New",Courier,monospace ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>htmlspecialchars()</h1>
    <?php
    $texto = 'Olivier & Co. a déclaré : "c\'est l\'été !"';
    echo htmlspecialchars($texto,ENT_QUOTES,'UTF-8');
    ?>

    <h1>htmlentities()</h1>
    <?php
    $texto = 'Olivier & Co. a déclaré : "c\'est l\'été !"';
    echo htmlentities($texto,ENT_QUOTES,'UTF-8');
    ?>

    <h1>nl2br()</h1>
    <?php
    $texto = "Primera línea.\nSegunda línea.";
    echo nl2br($texto);
    ?>

    <h1>strip_tags()</h1>
    <?php
    $texto = "<b>Olivier</b> <i>Heurtel</i>";
    echo $texto,'<br />';
    echo strip_tags($texto),'<br />';
    echo strip_tags($texto,'<b>'),'<br />';
    ?>

    </div>
  </body>
</html>
