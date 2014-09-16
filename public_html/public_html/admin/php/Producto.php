<?php
class Producto
{
	var $codigo;
	var $nombre;
	var $cantidad;
	var $precio;	
	
	
	
	
		function getCodigo(){
			return($this -> codigo);
		}
		function getNombre()	{
			return($this -> nombre);
		}
		function getCantidad()	{
			return($this -> cantidad);
		}
		function getPrecio()	{
			return($this -> precio);
		}

}
?>