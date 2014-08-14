<?php 
include_once("estudiante_collector.php");

$id =1;

$estudiante_collectorObj = new estudiante_collector();
echo ("hola");
foreach ($estudiante_collector->mostrar() as $c){
  echo "<div>";
  echo $c->getdestudiante() . "  && " .$c->getnombre();                                     
  echo "</div>"; 
}


 ?>

