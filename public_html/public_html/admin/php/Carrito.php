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
require('Collection.php');
require('Producto.php');

Class Carrito
{
	/**
	 * Viene representando la lista de productos del carrito
	 * @var Collection
	 */
	var $productos;
	
	function Carrito()
	{
		$this->productos = new Collection('Producto');
	}
	
	/**
	 * Esta funcion devuelve un producto a partir del codigo
	 * @param $codigo
	 * @return Producto
	 */
	public function getProducto($codigo)
	{
		$iterator = $this->productos->getIterator();
		while($iterator->valid())
		{
			$prod = $iterator->current();
			
			if($prod->codigo == $codigo)
			{
				return $prod;
			}
			
			$iterator->next();
		}
		
		return null;
	}
	
	/**
	 * Permite agregar un producto al carrito de compras
	 * @param $producto
	 * @return null
	 */
	public function agregarProducto($producto)
	{
		$prod = $this->getProducto($producto->codigo);
		if($prod) $prod->cantidad++;
		else
			$this->productos->add($producto);
	}
	
	/**
	 * Elimina un producto del carrito, a partir de un codigo
	 * @param $codigo
	 * @return null
	 */
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
	
	/**
	 * Se utiliza solo con fines de desarrollo, imprime la lista
	 * de productos del carrito, se puede modificar para imprimir
	 * toda la informacion de cada producto
	 * @return String
	 */
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
	
		
}
?>