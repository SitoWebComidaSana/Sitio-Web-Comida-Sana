<?php 
include_once("notascollector.php");

$id =1;

$notas_collectorObj = new notascollector();

foreach ($notas_collectorObj->mostrar() as $c){
  echo "<div>";
  echo $c->getid() . "  && " .$c->getnombre(). "  && " .$c->getparcial(). "  && " .$c->getnfinaln(). "  && " .$c->getmejoramiento(). "  && " .$c->getpromedio();                                     
  echo "</div>"; 
}


 ?>
