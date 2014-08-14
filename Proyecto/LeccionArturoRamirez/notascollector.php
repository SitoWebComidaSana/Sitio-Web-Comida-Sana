<?php

include_once('notas.php');
include_once('conexionLeccion.php');

class notas_collector
{
	public function mostrar()
    {
        $objConexion=new conexionLeccion();
        $sql="SELECT id FROM notas ";
        $resultset_notas = $objConexion->EjecutarSQL($sql);
        return $resultset_notas;
    }


}



?>
