<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>set_exception_handler()</title>
  </head>
  <body>
    <div>

    <?php 
    // Definir el controlador de excepción. 
    function controlador_excepción($excepción) { 
       // Mostar el archivo correspondiente, con el número de línea. 
       echo 'Archivo = ',$excepción->getFile(),'<br />'; 
       echo 'Línea   = ',$excepción->getLine(),'<br />'; 
       // Mostrar el mensaje. 
       echo 'Mensaje = ',$excepción->getMessage(),'<br />'; 
    } 
    // Especificar el controlador que se va a utilizar. 
    set_exception_handler('controlador_excepción'); 
    // Provocar una excepción. 
    throw new Exception('¡Error!'); 
    // Mostrar un mensaje de fin. 
    echo 'Fin'; 
    ?>

    </div>
  </body>
</html>
