<?php
$nomfich1 = "modulos.txt";
$fich1 = fopen($nomfich1, "a+");
$dato = "dwes;9\n";
fputs($fich1,$dato);
$dato = "dwec;8\n";
fwrite($fich1,$dato);
fclose($fich1);
