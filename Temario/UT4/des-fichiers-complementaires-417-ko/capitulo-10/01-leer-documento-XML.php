<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <title>Leer un documento XML</title>
  </head>
  <body>
  <div>
  
  <?php

  // Cargar el documento XML = simplexml_load_file()
  // - devuelve un objeto de la clase simplexml_element
  //   o FALSE en caso de error (documento XML mal formado, por ejemplo)
  $xml = simplexml_load_file('articulos.xml');
  if (! $xml) { exit; }

  // El objeto $xml tiene una estructura que corresponde a la
  // estructura de nuestro documento:
  // - artículo (matriz de objetos)
  //     - identificador
  //     - texto
  //     - precio

  // Ruta del nudo artículo (matriz).
  echo "<b>Ruta de \$xml->artículo</b><br />\n";
  foreach ($xml->artículo as $artículo) {
    printf("%s,%s,%s,%s,%s<br />\n",
           $artículo->identificador,
           $artículo->texto,
           $artículo->precio,
           $artículo['código'],
           $artículo['color']);
  }

  // Acceso a una información específica.
  echo "<b>Acceso a una información particular</b><br />\n";
  printf("Antes - Precio de %s = %s (código = %s)<br />\n",
         $xml->artículo[2]->texto,
         $xml->artículo[2]->precio,
         $xml->artículo[2]['código']);
  $xml->artículo[2]->precio = 123;
  $xml->artículo[2]['código'] .= '+';
  printf("Después - Precio de %s = %s (código = %s)<br />\n",
         $xml->artículo[2]->texto,
         $xml->artículo[2]->precio,
         $xml->artículo[2]['código']);

  // Extracción de los atributos de un nodo = método attributes()
  // - devuelve un objeto de la clase simplexml_element
  // - en nuestro ejemplo, recuperación de los atributos del 1er artículo
  $atributos = $xml->artículo[0]->attributes();

  // Ruta de los atributos así recuperados.
  echo "<b>Atributos del primer artículo</b><br />\n";
  foreach($atributos as $nombre => $valor) {
    printf("%s = %s<br />\n",$nombre,$valor);
  }

  // Extraer los hijos de un nodo = método children()
  // - devuelve un objeto de la clase simplexml_element
  echo "<b>Ruta del árbol</b><br />\n";
  echo "raíz<br />\n";
  foreach ($xml->children() as $nombre1 => $nivel1) {
    printf("----%s (%s,%s)<br />\n",
           $nombre1,$nivel1['código'],$nivel1['color']);
    foreach ($nivel1->children() as $nombre2 => $nivel2) {
      printf("--------%s = %s<br />\n",$nombre2,$nivel2);
    }
  }

  // Efectuar una búsqueda Xpath = método xpath()
  // - devuelve una matriz de objetos de la clase simplexml_element
  echo "<b>Búsqueda Xpath: /artículos/artículo</b><br />\n";
  $resultado = $xml->xpath("/artículos/artículo");
  foreach ($resultado as $valor) {
    printf("%s,%s<br />\n",$valor->identificador,$valor->texto);
  }
  echo "<b>Búsqueda Xpath: artículo/texto</b><br />\n";
  $resultado = $xml->xpath("artículo/texto");
  foreach ($resultado as $valor) {
    printf("%s<br />\n",$valor);
  }
  echo "<b>Búsqueda Xpath: //precio</b><br />\n";
  $resultado = $xml->xpath("//precio");
  foreach ($resultado as $valor) {
    printf("%s<br />\n",$valor);
  }

  // Generar una cadena XML = método asXML()
  echo "<b>Cadena XML</b><br />\n";
  file_put_contents ('los_articulos.xml',$xml->asXML());
  file_put_contents ('un_articulo.xml',$xml->artículo[0]->asXML());
  echo "Ver los archivos 'los_articulos.xml' y 'un_articulo.xml'<br />\n";

  ?>
  
  </div>
  </body>
</html>
