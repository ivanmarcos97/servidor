<?php
const MI_SITIO = 'miSitio.com';
$autores = ['Victor Hugo','Charles Baudelaire','Arthur Rimbaud','Paul Verlaine'];
function analizar_vocales($texto,&$nombre,&$empieza_por) {
  $empieza_por = in_array(strtoupper($texto[0]),['A','E','I','O','U','Y']);
  $nombre = preg_match_all('/[AEIOUY]/i',$texto);
}
?>
