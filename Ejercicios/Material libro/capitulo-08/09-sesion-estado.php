<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Estado de la sesión</title>
  </head>
  <body>
    <div>
    <?php 
    // Función que muestra el nombre de la constante 
    // de estado a partir de su valor. 
    function texto_estado($valor) { 
      switch ($valor) { 
        case PHP_SESSION_DISABLED: 
            return 'PHP_SESSION_DISABLED'; 
        case PHP_SESSION_NONE: 
            return 'PHP_SESSION_NONE'; 
        case PHP_SESSION_ACTIVE: 
            return 'PHP_SESSION_ACTIVE'; 
      } 
      return '?'; 
    } 
    echo 'Anes de session_start(): ', 
         texto_estado(session_status()),'<br />'; 
    session_start(); 
    echo 'Después de session_start(): ', 
         texto_estado(session_status()),'<br />'; 
    session_destroy(); 
    echo 'Después de session_destroy(): ', 
         texto_estado(session_status()),'<br />'; 
    ?>
    </div>
  </body>
</html>
