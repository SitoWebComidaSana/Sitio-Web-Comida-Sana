<?php

class Estudiante
	
	private $id_estudiante;
	private $nombre;

	
	function __construct($id_estudiante, $nombre)
	{
		$this->id_estudiante = $id_estudiante;
		$this->nombre = $nombre;
	}

	
	function getIestudiante()
	{
		return $this->id_estudiante;
	}


	function getNombre()
	{
		return $this->nombre;
	}


}


?>