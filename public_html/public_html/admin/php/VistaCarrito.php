<?php
session_start();
require("Carrito.php");

$carrito = new Carrito();
$_SESSION["carrito"] = $carrito;
//Creo dos productos para jugar con ellos
$prod = new Producto();
$prod->codigo = 1;
$prod->cantidad = 1;
$prod->nombre = "Cama";
$prod->precio = 50;

$prod2 = new Producto();
$prod2->codigo = 2;
$prod2->cantidad = 1;
$prod2->nombre = "Silla";
$prod2->precio = 23;

echo "Agregando dos productos...<br>";
$_SESSION["carrito"]->agregarProducto($prod);
$_SESSION["carrito"]->agregarProducto($prod2);
echo $_SESSION["carrito"]->trace();

echo "...............<br><br><br><br><br>";

echo "Modificando el producto de codigo 1...<br>";
$auxProd = $_SESSION["carrito"]->getProducto("1");
$auxProd->cantidad++;
echo $_SESSION["carrito"]->trace();

echo "...............<br><br><br><br><br>";

echo "Eliminando el producto de codigo 2... <br>";
$_SESSION["carrito"]->eliminarProducto("2");
echo $_SESSION["carrito"]->trace();

echo $_SESSION["carrito"]->Tamanio() >= 0;

echo "Listo...";
?>