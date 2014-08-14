<?php
class Especialidad
{
	private $pag_codigo;
	private $pag_descripcion;
	private $pag_estado;

	funtion __construct($codigo, $descripcion,$estado)
	{

		$this->pag_codigo= $codigo;
		$this->pag_descripcion=$descripcion;
		$this->pag_estado=$estado;
	}
	function setPag_codigo($codigo)
	{
		$this->pag_codigo=$codigo;

	}

	function getPag_codigo(){
		return $this->pag_codigo;

	}

	function setPag_descripcion($descripcion){
		$this->$pag_descripcion= $descripcion;

	}

	function getPag_descripcion(){
		return $this->pag_descripcion;
	}

	function setPago_estado($estado){
		$this->$pag_estado= $estado;
	}

	function getPago_estado(){
		return $this->$pag_estado;
	}

}


?>