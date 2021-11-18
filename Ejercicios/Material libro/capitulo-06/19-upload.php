<?php
// Inclusión del archivo que contiene las funciones generales.
include('../include/funciones.inc.php');
// Inicialización de la variable de mensaje.
$mensaje = '';
// Procesamiento del formulario.
if (isset($_POST['ok'])) {
  // Recuperar la información sobre el archivo.
  $información = $_FILES['archivo'];
  // Extrayendo:
  //    - su nombre
  $nombre = $información['name'];
  //    - su tipo MIME
  $tipo_mime = $información['type'];
  //    - su tamaño
  $tamaño = $información['size'];
  //    - la ubicación del archivo temporal
  $archivo_temporal = $información['tmp_name'];
  //    - el código de error
  $código_error = $información['error'];
  // Controles y procesamiento
  switch ($código_error) {
  case UPLOAD_ERR_OK:
    // Archivo recibido.
    // Determinar su destino final
    $destino = "../documentos/$nombre";
    // Copiar el archivo temporal (probar el resultado).
    if (copy($archivo_temporal,$destino)) {
      // Copia OK => mostrar un mensaje de confirmación.
      $mensaje  = "Transferencia completa - Archivo = $nombre - ";
      $mensaje .= "Tamaño = $tamaño bytes - ";
      $mensaje .= "Tipo MIME = $tipo_mime.";
    } else {
      // Problema de copia => incluir un mensaje de error.
      $mensaje = 'Problema al copiar al servidor.';
    }
    break;
  case UPLOAD_ERR_NO_FILE:
    // No se ha introducido ningún archivo.
    $mensaje = 'No se ha introducido ningún archivo.';
    break;
  case UPLOAD_ERR_INI_SIZE:
    // Tamaño archivo > upload_max_filesize.
    $mensaje  = "Archivo '$nombre' no transferido";
    $mensaje .= ' (tamaño > upload_max_filesize).';
    break;
  case UPLOAD_ERR_FORM_SIZE:
    // Tamaño archivo > MAX_FILE_SIZE.
    $mensaje  = "Archivo '$nombre' no transferido";
    $mensaje .= ' (tamaño > MAX_FILE_SIZE).';
    break;
  case UPLOAD_ERR_PARTIAL:
    // Archivo parcialmente transferido.
    $mensaje  = "Archivo '$nombre' no transferido";
    $mensaje .= ' (se produjo un problema durante la transferencia).';
    break;
  case UPLOAD_ERR_NO_TMP_DIR:
    // ningún directorio temporal.
    $mensaje  = "Archivo '$nombre' no transferido";
    $mensaje .= ' (ningún directorio temporal).';
    break;
  case UPLOAD_ERR_CANT_WRITE:
    // Error al escribir el archivo en el disco.
    $mensaje  = "Archivo '$nombre' no transferido";
    $mensaje .= ' (error al escribir el archivo en el disco).';
    break;
  case UPLOAD_ERR_EXTENSION:
    // Transferencia detenida por la extensión.
    $mensaje  = "Archivo '$nombre' no transferido";
    $mensaje .= ' (transferencia detenida por la extensión).';
    break;
  default:
    // ¡Error inesperado!
    $mensaje  = "Archivo no transferido";
    $mensaje .= " (error desconocido: $código_error ).";
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Upload</title>
  </head>
  <body>
    <form action="19-upload.php" method="post" 
                   enctype="multipart/form-data">
    <div>
      Archivo: 
      <input size="100" type="file" name="archivo" value="" />
      <input type="submit" name="ok" value="OK" /><br />
      <?php echo hacia_página($mensaje); ?>
    </div>
    </form>
  </body>
</html>
