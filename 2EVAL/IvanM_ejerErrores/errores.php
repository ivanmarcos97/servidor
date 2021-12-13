<?php
//incluimos archivo de controladores
include_once "./miscontroladores.php";
include_once "./micontrolador.php";
//primer controlador que se utiliza
set_error_handler("micontrolador1");

//variable sin definir notice controlador 1
$DIVIDIR;
echo  $DIVIDIR;

//array asociativo sin comillas warning controlador 1
$array = ["primero" => 1, segundo => 2];

//a partir de aqui se utiliza el controlador 2
set_error_handler("micontrolador2");

//constante redefinida notice controlador 2
const DIV = 3;
const DIV = "cuatro";

//incluimos ruta de archivo mal controlador 2
include_once("./noencontrado");

//a partir de aqui se utiliza el controlador general
set_error_handler("micontroladorgeneral");



echo "<br><br>----------------------------------------------------------------------------------------------------------------------<br><br>";
//anteriores errores pero con controlador general
//variable sin definir notice 
$DIVIDIR;
echo  $DIVIDIR;

//array asociativo sin comillas warning 
$array = ["primero" => 1, segundo => 2];

//constante redefinida notice 
const DIV = 3;
const DIV = "cuatro";

//incluimos ruta de archivo mal 
include_once("./noencontrado");
