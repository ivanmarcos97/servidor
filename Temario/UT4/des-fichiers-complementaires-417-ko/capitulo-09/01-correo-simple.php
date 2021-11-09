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
    
    <h1>Ejemplo de mensaje simple</h1>
    <?php
    // Destinatario.
    $destinatario = 'olivier@diane.priv';
    // Asunto.
    $asunto = 'Registro en miSitio.com';
    // Mensaje.
    $mensaje =
    'Señor Heurtel,
    Gracias por su registro en nuestro sitio miSitio.com.
    Esperamos que este sitio cumpla con sus expectativas.
    El webmaster.';
    // Envío.
    // $ok = mail($destinatario,$asunto,$mensaje);
    echo 'Nota: la línea de código que permite enviar el correo está en el comentario.<br />';
    ?>

    </div>
  </body>
</html>
