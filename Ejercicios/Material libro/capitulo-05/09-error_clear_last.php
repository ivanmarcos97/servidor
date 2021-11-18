<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>error_get_last()</title>
  </head>
  <body>
    <div>

    <?php 
    // Generar un error (sin mostrarlo: @...). 
    @readfile('/tmp/infos.txt'); 
    // Mostrar el tipo de error_get_last(). 
    echo 'error_get_last() = ',gettype(error_get_last()),'<br />'; 
    // Borrar el último error.
    error_clear_last() ;
    // Mostrar el tipo de error_get_last(). 
    echo 'error_get_last() = ',gettype(error_get_last()),'<br />'; 
    ?>

    </div>
  </body>
</html>
