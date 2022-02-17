<?php
if (isset($_COOKIE['test']) && isset($_COOKIE['examen'])) {
	$test = $_COOKIE['test'];
	$examen = $_COOKIE['examen'];
	if ($test == "norealizado" && $examen == "realizado") {
		header("location: formulario_test.php");
	}
	if ($test == "realizado" && $examen == "norealizado") {
		header("location: formulario_examen.php");
	}
	if ($test == "realizado" && $examen == "realizado") {
		header("location: ok.html");
	}
	if ($test == "norealizado" && $examen == "norealizado") {
		header("location: formulario.php");
	}
} else {
	header("location: formulario.php");
}
