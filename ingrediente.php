<?php
include clsConexion;
include 


class Ingrediente
{
	
	private $_cod_ingrediente;
	private $_descripcion

	function __construct(cod_ingrediente, descripcion)
	{
		$this->_cod_ingrediente = $cod_ingrediente;
		$this->_descripcion = $descripcion;
	}

	
	function getName()
	{
		return $this->cod_ingrediente;
	}


	function getName()
	{
		return $this->descripcion;
	}


	public function mostrar()
    {
        $objConexion=new clsConexion();
        $sql="SELECT cod_ingrediente FROM tbl_ingrediente WHERE Estado='A'";
        $resultset_ingrediente = $objConexion->EjecutarSQL($sql);
        return $resultset_ingrediente;
    }




}


?>