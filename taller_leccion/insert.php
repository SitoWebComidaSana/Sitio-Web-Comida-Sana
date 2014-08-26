<?php
$valor1=$_POST ("nombre");
$valor2=$_POST ("descripcion");
$valor3=$_POST ("imagen");

incule_once ("DemoCollector.php");

DemoCollectorObj= new DemoCollector();
DemoCollectorObj= new createPlato($valor1, $valor2, $valor3);

echo "valor agregado";


?>

