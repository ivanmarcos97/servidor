<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Manipular los archivos en el servidor</title>
    <style type="text/css">
      h1 { font-family: verdana,arial,helvetica,sans-serif ; font-size: 100% ; margin-top: 20pt }
    </style>
  </head>
  <body>
    <div>
    
    <h1>Algunas operaciones básicas con los archivos</h1>
    <?php
    // Abrir un archivo en escritura.
    $f = fopen('../documentos/info.txt','wb');
    // Escribir en el archivo.
    fwrite($f, 'Olivier HEURTEL');
    // Cerrar el archivo.
    fclose($f);
    // Abrir un archivo en lectura.
    $f = fopen('../documentos/info.txt','rb');
    // Leer en el archivo.
    $texto = fread($f, filesize('../documentos/info.txt'));
    // Cerrar el archivo.
    fclose($f);
    // Mostrar la información leída
    echo $texto,'<br />';
    // Más simple: utilizar file_get_contents.
    $texto = file_get_contents('../documentos/info.txt');
    // Mostrar la información leída
    echo $texto;
    ?>
    
    <h1>Visualización del contenido de un directorio</h1>
    <?php
    // Primer método: opendir + readdir + closedir.
    echo '<b>1) opendir + readdir + closedir</b><br />';
    // Abrir el directorio.
    $dir = opendir('../documentos');
    // Examinar el directorio enumerando el nombre de un archivo
    // en cada iteración.
    while($archivo = readdir($dir)) {
      echo $archivo,'<br />';
    }
    // Cerrar el directorio.
    closedir($dir);
    // Segundo método: scandir.
    echo '<br /><b>2) scandir</b><br />';
    // Listar el contenido del directorio en una matriz.
    $archivos = scandir('../documentos');
    // Examinar resultado.
    foreach ($archivos as $archivo) {
      echo $archivo,'<br />';
    }
    ?>

    </div>
  </body>
</html>
