<?php
if(isset($_COOKIE['actividades']))
	{
	$datos=explode("-",$_COOKIE['actividades']);
	if ($datos[0]=="norealizado" && $datos[1]=="realizado")
		header ("location: formulario_test.php");
	if ($datos[0]=="realizado" && $datos[1]=="norealizado") 
		header ("location: formulario_examen.php");
	if ($datos[0]=="realizado" && $datos[1]=="realizado") 
		header ("location: ok.html");
	}
else
	header ("location: formulario.php");
?>	