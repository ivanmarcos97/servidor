<?php

class Usuario
{
	private $nom;
	private $clave;
	private $hora;
	function __construct($n, $c, $h)
	{
		$this->nom = $n;
		$this->clave = $c;
		$this->hora = $h;
	}
	function __get($atrib)
	// método mágico para acceder a un atributo fuera de la clase
	{
		return ($this->$atrib);
	}
	function horas()
	{

		$this->hora .=  "<br>" . date("H:i:s");
		echo $this->hora;
	}
} //fin de la clase Usuario
