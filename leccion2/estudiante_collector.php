<?php

include_once('estudiante.php');
include_once('clsConexion.php');

class estdian_collector_collector
{
	public function mostrar()
	
    {
	
        $objConexion=new clsConexion();
        $sql="SELECT id FROM calificacion ";
        $resultset_ingrediente = $objConexion->EjecutarSQL($sql);
        return $resultset_ingrediente;
    }


}



?>