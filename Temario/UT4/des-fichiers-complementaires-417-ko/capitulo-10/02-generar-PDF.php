<?php

// Inclusión de la biblioteca.
include ('../include/fpdf/fpdf.php');

// Cargar la lista de artículos desde el documento XML.
$xml = simplexml_load_file('articulos.xml');
if (! $xml) { 
  exit('Error al cargar la lista de artículos.'); 
}

// Crear un nuevo documento PDF = new FPDF()
// - primer parámetro = orientación
//     > P = retrato - L = Paisaje
// - segundo parámetro = unidad de medida
//     > pt = punto - mm = milímetro - cm = centímetro
// - tercer parámetro = formato (A3, A4, etc)
// Todos los parámetros son opcionales. Predeterminado = P, mm, A4.
$pdf = new FPDF('P','mm','A4');

// Definir los saltos de página automáticos = SetAutoPageBreak()
// - primer parámetro = automático (true/false)
//     > P = retrato - L = Paisaje
// - segundo parámetro = margen
//     > distancia en relación al final de la página que desencadena
//       el salto (2 cm predeterminado, si activo)
$pdf->SetAutoPageBreak(false);

// Crear una nueva página en el documento = AddPage()
// - primer parámetro = orientación
//     > P = retrato - L = Paisaje
//       Por defecto, la del documento.
$pdf->AddPage();

// Definir la información de resumen del documento = SetTitle(), 
// SetAuthor(), SetSubject().
$pdf->SetTitle('Lista de artículos');
$pdf->SetAuthor('Olivier HEURTEL');
$pdf->SetSubject('Frutas');

// Definir la fuente utilizada = SetFont()
// - primer parámetro = familia
//     > nombre de una familia estándar (Courier, Helvetica o Arial, 
//       Times, Symbol, ZapfDingbats) o de un nombre definido por
//       AddFont().
// - segundo parámetro (opcional) = estilo
//     > combinación de: B = negrita - I = cursiva - U = subrayado
// - tercer parámetro (opcional) = tamaño en puntos.
// Ver también el método SetFontSize() para modificar el tamaño.
$pdf->SetFont('Arial','B',16);

// Escribir texto desde la posición actual = Write()
// - primer parámetro = altura de la línea
// - segundo parámetro = texto a escribir
// Utiliza las características actuales de la fuente, colores, etc.
// El retorno de línea es automático cuando se llega al final
// (o cuando se encuentra con el carácter \n).
$pdf->Write(5, utf8_decode('Lista de artículos'));

// Efectuar un salto de línea = Ln()
// - primer parámetro (opcional) = altura de la línea
// La abscisa toma el valor del margen izquierdo.
$pdf->Ln(10);

// Cambiar el tamaño de fuente = SetFontSize()
// - primer parámetro = fuente en puntos
$pdf->SetFontSize(12);

// Definir el color que se utilizará para el texto = SetTextColor()
// - si un solo parámetro = nivel de gris (entre 0 y 255)
// - si 3 parámetros = componentes RGB (entre 0 y 255)
$pdf->SetTextColor(255,0,0); // rojo

// Definir el color que se utilizará para el fondo = SetFillColor()
// - si un solo parámetro = nivel de gris (entre 0 y 255)
// - si 3 parámetros = componentes RGB (entre 0 y 255)
$pdf->SetFillColor(255,255,140); // amarillo claro

// Escribir una celda = Cell()
// - primer parámetro = longitud (0 = hasta el margen derecho)
// - segundo parámetro = altura
// - tercer parámetro = texto escrito
// - cuarto parámetro = borde
//     > es un número: 0 = sin borde - 1 = marco
//     > es una cadena: combinación de L (izquierda), T (alto),
//                         R (derecha), B (bajo)
// - quinto parámetro = posición al final
//     > 0 = a la derecha - 1 = inicio de la línea siguiente - 2 = debajo
// - sexto parámetro = alineación
//     > L o cadena vacía = a la izquierda - C = centrado - R = a la derecha
// - séptimo parámetro = relleno
//     > 0 = no - 1 = sí
// Solo el primer parámetro es obligatorio.
$pdf->Cell(80,7,utf8_decode('Texto'),1,0,'C',1); // título de la columna
$pdf->Cell(40,7,'Precio',1,1,'C',1); // título de la columna

// Cambiar el color y la fuente
$pdf->SetFont('Arial','',12); // '' = normal
$pdf->SetTextColor(0,0,0); // negro

// En un bucle, escribir los datos de la matriz.
foreach ($xml->artículo as $artículo) { // ruta del documento XML
  $precio = number_format((float)$artículo->precio,2,',',' ');
  $pdf->Cell(80,7,utf8_decode($artículo->texto),1);
  $pdf->Cell(40,7,$precio,1,1,'R'); // línea siguiente + a la derecha
}

// Colocarse en un lugar específico de la página = SetXY()
// - primer parámetro = abscisa (x)
// - segundo parámetro = ordenada (y)
// El origen es la esquina superior izquierda.
// Si los valores son negativos, el origen es la esquina 
// inferior derecha.
// Ver también SetX() y SetY().
$pdf->SetXY(10,-10); // 1 cm a la izquierda, 1 cm del final

// Mostrar el número de página = PageNo()
$pdf->SetFontSize(10);
$pdf->Cell(0,0,'Página '.$pdf->PageNo(),0,0,'R');

// Mostrar una imagen = Image()
// - primer parámetro = nombre del archivo
// - segundo parámetro = abscisa de la esquina superior izquierda
// - tercer parámetro = ordenada de la esquina superior izquierda
// - cuarto parámetro (opcional) = longitud de la imagen
//     > 0 o nada = calculado automáticamente
// - quinto parámetro (opcional) = altura de la imagen
//     > 0 o nada = calculado automáticamente
// - sexto parámetro (opcional) = tipo
//     > JPG o JPEG o PNG
//     > Deducido de la extensión si ausente
$pdf->Image('../imagenes/logo.jpg',10,285,20);

// Definir el color a utilizar para el dibujo = SetDrawColor()
// - si un solo parámetro = nivel de gris (entre 0 y 255)
// - si 3 parámetros = componentes RGB (entre 0 y 255)
$pdf->SetDrawColor(128); // nivel de gris
$pdf->line(10,15,200,15); // línea horizontal superior
$pdf->line(10,285-2,200,285-2); // línea horizontal inferior

// Enviar el documento a un destino = Output()
// - primer parámetro (opcional) = nombre del archivo
// - segundo parámetro (opcional) = tipo de destino
//     > F = archivo en el servidor
//       I = navegador (en línea)
//       D = navegador (descarga)
// Si no hay parámetro: destino = I
// Si se especifica un nombre: destino predeterminado = F
$pdf->Output(); // navegador (en línea)

?>
