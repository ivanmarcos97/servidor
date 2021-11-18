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
    
    <h1>Ejemplo de mensaje más complejo</h1>
    <?php
    // Dos destinatarios separados por una coma.
    $destinatarios = 'olivier@diane.priv,xavier@zeus.priv';
    // Asunto.
    $asunto = 'Registro en la maratón';
    // Mensaje.
    $mensaje .= "Olivier, Xavier,\n";
    $mensaje .= "Les confirmamos su registro en \n";
    $mensaje .= "la maratón del domingo 11 de abril.\n";
    $mensaje .= "La salida será a las 8h45.\n\n";
    $mensaje .= "La organización.\n";
    // Encabezados adicionales.
    $encabezados.= "From: \"Registro\" <contact@maraton.es>\r\n";
    $encabezados.= "Reply-To: \"Registro\" <contact@maraton.es>\r\n";
    $encabezados .= "Content-Type: text/plain; charset=utf-8\r\n";
    $encabezados .= "X-Priority: 1\r\n";
    // Envío.
    // $ok = mail($destinatarios,$asunto,$mensaje,$encabezados);
    echo 'Nota: la línea de código que permite enviar el correo está en el comentario.<br />';
    ?>

    </div>
  </body>
</html>
