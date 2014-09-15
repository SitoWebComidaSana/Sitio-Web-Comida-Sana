<?php
/**
 * Esta clase permite manejar funciones basicas de un carrito de
 * compras, esta desarrollada usando el patron de diseño iterator
 * para orfecer mayor encapsulamiento y orden en los datos
 * para utilizarla deben tener una clase producto que contenga 
 * el atributo "codigo" representando la identificacion del producto
 * 
 * Cualquier duda pueden escribir a aalejo@gmail.com
 * o entrar en la explicacion de esta clase en 
 * www.internetdeveloping.blogspot.com
 */


Class Cls_CarritoBase
{
	
	//var $productos;
	
	function Cls_CarritoBase()
	{
		//$this->productos = new Collection('Producto');
		$this -> observacion = "";
	}
	
	
	public function getProductos($codigo)//codigo por usuario sesionado y x estado del producto = solicitado
	{
			session_start();
			date_default_timezone_set('utc');//fecha
			if(isset($_SESSION["_usuario"])){}
			else{
				$usuario =  date("Ymd").'/'.rand();
				$_SESSION["_usuario"] = $usuario;
			}
			
			include_once('InstConexion.php');
			$objeto = new  InstConexion();
			$objeto->Conectar();			
							
			$consult="SELECT `dped_linea`, `cped_codigo`, `dped_cantidad`, `estado`,`pla_codigo`, `pla_nombre`, `pla_descripcion`, `pla_precio`
 			FROM `detalle_pedido`, `plato` where `detalle_pedido`.`cod_plato` = `plato`.`pla_codigo` and estado='solicitado' and `usuario` =  '".$codigo."' ";
			
			$resultado = false;
			$conexion = $objeto->conectaBaseDatos();
			$sentencia = $conexion->prepare($consult);
			try {
				if(!$sentencia->execute()){
					print_r($sentencia->errorInfo());
				}
				$resultado = $sentencia->fetchAll();
				$sentencia->closeCursor();
			}
			catch(PDOException $e){
				echo "Error al ejecutar la sentencia: \n";
					print_r($e->getMessage());
			}
			return $resultado;
	}
/*
	public function agregarProducto($producto)
	{
		$prod = $this->getProducto($producto->codigo);
		if($prod) $prod->cantidad++;
		else
			$this->productos->add($producto);
	}
	

	public function eliminarProducto($codigo)
	{
		$existe = false;
		$iterator = $this->productos->getIterator();
		while($iterator->valid())
		{
			$prod = $iterator->current();
			if($prod->codigo == $codigo)
			{
				if($prod->cantidad > 1)
					$prod->cantidad--;
				else
				{
					$this->productos->remove($iterator->key());
				}
			}
			$iterator->next();
		}
	}
	

	public function trace()
	{
		$out = "";
		$iterator = $this->productos->getIterator();
		while($iterator->valid())
		{
			$prod = $iterator->current();
			
			$out .= "Producto ".$prod->nombre." -> ".$prod->cantidad."<br>";
			
			$iterator->next();
		}
		
		return $out;
	}
	*/
		
}
?>