<?php 
include_once("ingrediente_collector.php");

$id =1;

$ingrediente_collectorObj = new ingrediente_collector();

foreach ($ingrediente_collectorObj->mostrar() as $c){
  echo "<div>";
  echo $c->getIdingrediente() . "  && " .$c->getDescripcion();                                     
  echo "</div>"; 
}


 ?>

