<?php 
include_once("PlatoCollector1.php");

$id =1;

$forma_pagocollectorObj = new PlatoCollector();

foreach ($Forma_pagocollector->mostrar() as $c){
  echo "<div>";
  echo $c->getPag_codigo() . "  && " .$c->getPag_descripcion(). "&&" .$ c->getPago_estado
  echo "</div>"; 
}


 ?>

