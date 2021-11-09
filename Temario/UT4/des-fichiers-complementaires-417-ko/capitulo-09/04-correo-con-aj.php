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
    
    <h1>Mensaje con archivo adjunto</h1>
    <?php
    // Destinatarios.
    $destinatarios = 'xavier@zeus.fr';
    // Asunto.
    $asunto = '¡Hola!';
    // Encabezados adicionales.
    $encabezados = '';
    // -> origen del mensaje
    $encabezados.= "From: \"Olivier\" <olivier@diane.com>\r\n";
    // -> mensaje en formato Multipart MIME
    $encabezados .= "MIME-Version: 1.0\r\n";
    $encabezados .= "Content-Type: multipart/mixed; ";
    $encabezados .= "boundary=\"=O=L=I=V=I=E=R=\"\r\n";
    // Mensaje.
    $mensaje  = "";
    // -> primera parte del mensaje (texto propiamente dicho)
    //    -> encabezado de la parte
    $mensaje .= "--=O=L=I=V=I=E=R=\r\n";
    $mensaje .= "Content-Type: text/plain; ";
    $mensaje .= "charset=utf-8\r\n ";
    $mensaje .= "Content-Transfer-Encoding: 8bit\r\n";
    $mensaje .= "\r\n"; // línea vacía
    //    -> datos de la parte
    $mensaje .= "Ver el archivo adjunto.\r\n";
    $mensaje .= "\r\n"; // línea vacía
    // -> segunda parte del mensaje (archivo adjunto)
    //    -> encabezado de la parte
    $mensaje .= "--=O=L=I=V=I=E=R=\r\n";
    $mensaje .= "Content-Type: application/octet-stream; ";
    $mensaje .= "name=\"PJ.DOC\"\r\n";
    $mensaje .= "Content-Transfer-Encoding: base64\r\n";
    $mensaje .= "Content-Disposition: attachment; ";
    $mensaje .= "filename=\"pj.doc\"\r\n";
    $mensaje .= "\r\n"; // línea vacía
    //    -> lectura del archivo correspondiente al archivo adjunto
    $datos = file_get_contents('../documentos/pj.doc');
    //    -> codificación y fragmentación de los datos
    $datos = chunk_split(base64_encode($datos));
    //    -> datos de la parte (integración en el mensaje)
    $mensaje .= "$datos\r\n";
    $mensaje .= "\r\n"; // línea vacía
    // Delimitador de final del mensaje.
    $mensaje .= "--=O=L=I=V=I=E=R=--\r\n";
    // Envío del mensaje.
    // $ok = mail($destinatarios,$asunto,$mensaje,$encabezados);
    echo 'Nota: la línea de código que permite enviar el correo está en el comentario.<br />';
    ?>                

    </div>
  </body>
</html>
