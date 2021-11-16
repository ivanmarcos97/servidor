<?php 
require_once("alumno2.php");
require_once("primero.php");
require_once("segundo.php");
$primero1=new Primero ("Carlos",96,10);
$primero1->supera_curso();
$segundo1=new segundo ("Juan Carlos",86,10,8,"no apto");
$segundo1->supera_curso();
?>