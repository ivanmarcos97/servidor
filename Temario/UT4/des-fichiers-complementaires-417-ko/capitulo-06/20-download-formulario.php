<?php
// Lista de documentos (procedente sin duda de una
// base de datos en una aplicación real).
$documentos = array('cv.pdf','foto.png');
// Procesamiento del formulario si $_POST no está vacío
if (! empty($_POST)) {
  // Recuperar el número del documento.
  // Tomar la clave de la primera línea de $_POST
  // (normalmente del tipo n_x, n siendo el número del documento).
  list($número) = each($_POST);
  // Convertir la cadena en entero => sólo queda el n°.
  $número = (integer) $número;
  // Deduciendo el nombre del documento.
  $nombre_archivo = $documentos[$número];
  // Enviar el encabezado de adjunto.
  $header  = "Content-Disposition: attachment; ";
  $header .= "filename=$nombre_archivo\n" ;
  header($header);
  // Envoyer el encabezado del tipo MIME (aquí, "desconocido").
  header("Content-Type: x/y\n");
  // Enviar el documento.
  // No hay cifrado de tipo magic quotes antes de leer el archivo.
  readfile("../documentos/$nombre_archivo");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Download</title>
  </head>
  <body>
    <form action="20-download-formulario.php" method="post">
    <table border="1" cellpadding="4" cellspacing="0">
    <tr align="center">
      <th>documento</th><th>descargar</th>
    </tr>
    <?php
    // Una pequeña porción de código PHP para generar las líneas de la
    // matriz que presenta la lista de documentos.
    // Examinar la lista de documentos y utilizar el nombre
    // para la visualización y el número como nombre de la imagen.
    foreach($documentos as $número => $documento) {
      echo sprintf
          (
          "<tr><td>%s</td><td align=\"center\">%s</td></tr>\n",
          $documento,
          "<input type=\"image\" name=\"$número\"
          src=\"../imagenes/download.png\" />"
          );
    }
    ?>
    </table>
    </form>
  </body>
</html>
