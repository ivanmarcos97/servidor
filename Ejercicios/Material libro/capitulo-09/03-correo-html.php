<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Enviar un correo electrónico</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>Mensaje en formato HTML</h1>
    <?php
    // Destinatarios.
    $destinatarios = 'xavier@zeus.fr';
    // Asunto.
    $asunto = '¡Hola!';
    // Encabezados adicionales.
    $encabezados.= "From: \"Olivier\" <olivier@diane.com>\r\n";
    $encabezados .= "MIME-Version: 1.0\r\n";
    $encabezados .= "Content-Type: text/html; charset=utf-8\r\n";
    $encabezados .= "Content-Transfer-Encoding: 8bit\r\n";
    // Mensaje (HTML).
    $mensaje .= "<html>\n";
    $mensaje .= "<head><title>¡Hola!</title></head>\n";
    $mensaje .= "<body>\n";
    $mensaje .= "<font color=\"green\">¡Hola!</font>\n";
    $mensaje .= "</body>\n";
    $mensaje .= "</html>\n";
    // Envío.
    // $ok = mail($destinatarios,$asunto,$mensaje,$encabezados);
    echo 'Nota: la línea de código que permite enviar el correo está en el comentario.<br />';
    ?>

    </div>
  </body>
</html>
