<?php
$nomfich1 = "modulos2.txt";
$fich1 = fopen($nomfich1, "a+");
$dato = "dwes 9".PHP_EOL;
fputs($fich1,$dato);
$dato = "dwec 8".PHP_EOL;
fwrite($fich1,$dato);
fclose($fich1);
