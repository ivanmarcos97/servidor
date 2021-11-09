<?php

// Definir un encabezado que indique que se trata de una imagen (aquí PNG).
header('Content-type: imagen/png');

/*

Las funciones definidas en el script utilizan dos variables globales:
- $imagen         = recurso de imagen en creación
- $altura_imagen  = altura de la imagen

Para las coordenadas, el origen es la esquina superior izquierda.
Para el dibujo de nuestro gráfico, utilizamos un origen en la
esquina inferior izquierda (más práctico). Las funciones efectúan la
conversión.

*/

// Función de dibujo de un rectángulo
// - $x1,$y1         = punto 1
// - $x2,$y2         = punto 2
// - $borde, $fondo = colores del borde y del fondo
//
function rectángulo($x1,$y1,$x2,$y2,$borde,$fondo) {

  global $imagen;
  global $alto_imagen;

  // Conversión del sistema de coordenadas para el eje y.
  $y1 = $alto_imagen - 1 - $y1;
  $y2 = $alto_imagen - 1 - $y2;

  // Dibujar el borde de un rectángulo = imagerectangle
  imagerectangle($imagen,$x1,$y1,$x2,$y2,$borde);

  // Relleno (si es necesario, por ejemplo $fondo rellenado)
  if ( ( $fondo != NULL) and ($x1 != $x2) and ($y1 != $y2) ) {

    // Rellenar un rectángulo = imagenfilledrectangle
    imagefilledrectangle($imagen,$x1+1,$y1-1,$x2-1,$y2+1,$fondo);
  }
}

// Función de dibujo de una línea
// - $x1,$y1  = punto 1
// - $x2,$y2  = punto 2
// - $color = color
//
function línea($x1,$y1,$x2,$y2,$color) {

  global $imagen;
  global $alto_imagen;

  // Conversión del sistema de coordenadas para el eje y
  $y1 = $alto_imagen - 1 - $y1;
  $y2 = $alto_imagen - 1 - $y2;

  // Dibujar una línea = imagenline
  imageline($imagen,$x1,$y1,$x2,$y2,$color);

}

// Función de dibujo de un texto
// - $fuente     = código de la fuente predefinida (1 a 5)
// - $x,$y       = punto de referencia
// - $texto      = texto
// - $color    = color
// - $horizontal = alineación horizontal con respecto al punto 
//                 de referencia
//      > D = alineado a la derecha, C = centrado, G = alineado a la izquierda
// - $vertical = alineación vertical con respecto al punto
//      > H = texto superior, C = centrado, B = texto inferior
//
function texto($fuente,$x,$y,$texto,$color,$horizontal,$vertical) {

  global $imagen;
  global $alto_imagen;

  // Conversión del sistema de coordenadas para el eje y
  $y = $alto_imagen - 1 - $y;

  // Calculer la ancho d'un caractère dans une fuente = 
  // imagefontwidth
  $ancho = imagefontwidth($fuente) * strlen($texto);

  // Calcular la altura de un carácter en una fuente = 
  // imagenfontheight
  $alto = imagefontheight($fuente);

  // Cálculo de coordenadas en función de la alineación
  switch ($horizontal) {
    case 'D':
      $x = $x - $ancho;
      break;
    case 'C':
      $x = $x - floor($ancho/2);
      break;
    case 'G':
      break;
  }
  switch ($vertical) {
    case 'H':
      $y = $y - $alto;
      break;
    case 'C':
      $y = $y - floor($alto/2);
      break;
    case 'B':
      break;
  }

  // Dibujar un texto = imagestring
  imagestring($imagen,$fuente,$x,$y,$texto,$color);
}

// Para este ejemplo, los datos del gráfico se calculan de 
// forma aleatoria.
// - unidad, valor mínimo y valor máximo para el eje y;
$eje_y_unido = 10;
$eje_y_min = 0;
$eje_y_max = 40;
// - número de barras: entre 5 y 15
$número_barras = rand(5,15);
// - poner los datos en la matriz
$datos = array();
for ($i = 1 ; $i <= $número_barras ; $i++) {
  $datos[$i] = rand($eje_y_min,$eje_y_max);
}

// Dimensiones del dibujo (píxeles)
$ancho_imagen = 400; // ancho de la imagen
$alto_imagen = 200; // altura de la imagen
$margen_blanco = 2;   // margenn blanco
$margen_izquierdo = 25;   // margenn izquierdo con la zona de trazado
$margen_derecho = 20;   // margenn derecho con la zona de trazado
$margen_superior = 20;    // margenn superior con la zona de trazado
$margen_inferior = 30;    // margenn inferior con la zona de trazado
$separación_barras = 5;    // separación entre las barras

// Deducir la longitud y la altura de la zona de trazado.
$ancho_trazado = $ancho_imagen - $margen_derecho - $margen_izquierdo;
$alto_trazado = $alto_imagen - $margen_superior - $margen_inferior;

// Deducir la longitud de las barras y la escala del eje y.
$ancho_barra = ($ancho_trazado-$separación_barras)/$número_barras - $separación_barras ;
$escala_eje_y = ($alto_trazado-1) / $eje_y_max ;

// Crear la imagen = imagecreatetruecolor
$imagen = imagecreatetruecolor($ancho_imagen,$alto_imagen);

// Definir los colores = imagecolorallocate
// - en RGB
$blanco = imagecolorallocate($imagen, 255, 255, 255);
$negro = imagecolorallocate($imagen, 0, 0, 0);
$gris_claro = imagecolorallocate($imagen, 192, 192, 192);
$gris_oscuro = imagecolorallocate($imagen, 100, 100, 100);
$verde = imagecolorallocate($imagen, 0, 128, 0);

// Coordenadas de la imagen.
$ox1 = 0; $oy1 = 0;
$ox2 = $ancho_imagen - 1; $oy2 = $alto_imagen - 1;
// dibujar el marco exterior
rectángulo($ox1,$oy1,$ox2,$oy2,$negro,$blanco);

// Coordenadas de la imagen menos el borde blanco.
$mx1 = $ox1 + $margen_blanco; $my1 = $oy1 + $margen_blanco;
$mx2 = $ox2 - $margen_blanco; $my2 = $oy2 - $margen_blanco;
// dibujar el fondo gris claro
rectángulo($mx1,$my1,$mx2,$my2,$gris_claro,$gris_claro);

// Coordenadas de la zona de trazado.
$tx1 = $ox1 + $margen_izquierdo; $ty1 = $oy1 + $margen_inferior;
$tx2 = $ox2 - $margen_derecho; $ty2 = $oy2 - $margen_superior;
// dibujar el marco de la zona de trazado
rectángulo($tx1,$ty1,$tx2,$ty2,$negro,NULL);

// Dibujo de líneas horizontales con su etiqueta.
$x1 = $tx1;
$x2 = $tx2;
for ($eje = $eje_y_min ; $eje <= $eje_y_max ; $eje += $eje_y_unido) {
  $y1 = $ty1 + $eje * $escala_eje_y;
  $y2 = $y1;
  // No dibujar la línea abajo y arriba.
  if ( ( $eje > $eje_y_min ) and ( $eje < $eje_y_max ) ) {
    línea($x1,$y1,$x2,$y2,$gris_oscuro);
  }
  texto(3,$x1-2,$y1,$eje,$negro,"D","C");
}

// Dibujo de las barras.
$i = 0;
foreach($datos as $clave => $valor) {
  $i++;
  $x1 = $tx1 + $separación_barras + ($i-1)*($separación_barras+$ancho_barra);
  $x2 = $x1 + $ancho_barra;
  $y1 = $ty1;
  $y2 = $y1 + $valor * $escala_eje_y;
  rectángulo($x1,$y1,$x2,$y2,$negro,$verde);
  texto(3,($x1+$x2)/2,$y1,$clave,$negro,"C","B");
}

// Generar la imagen en formato PNG = imagepng
// - ya sea en la pantalla (sin segundo parámetro);
// - ya sea en un archivo (segundo parámetro = nombre del archivo).
// Existen funciones similares para otros formatos.
imagepng($imagen /*, 'imagen.png' */);

// Eliminar la imagen = imagedestroy
imagedestroy($imagen);

?>