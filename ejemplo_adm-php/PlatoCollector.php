<?php

include_once('plato.php');
include_once('Collector.php');

class DemoCollector extends Collector
{
  
  function show($id) {
    $row = self::$db->getRows("SELECT * FROM plato where idplato= ? ", array("{$id}")); 
    $ObjPlato = new plato($row[0]{'idplato'},$row[0]{'nombre'},$descripcion[0]{'descripcion'});
    return $ObjPlato;
  }

  function createPlato($nombre) {    
    $insertrow = self::$db->insertRow("INSERT INTO proyecto.plato (idplato, nombre, descripcion) VALUES (?, ?, ?)", array(null, "{$nombre}","{$descripcion}"));
  }  

  function readPlato() {
    $rows = self::$db->getRows("SELECT * FROM plato ");        
    $arrayPlato= array();        
    foreach ($rows as $c){
      $aux = new Demo($c{'idpalto'},$c{'nombre'}, $c{'descripcion'});
      array_push($arrayPlato, $aux);
    }
    return $arrayPlato;        
  }
  
  function updatePlato($id,$nombre) {    
    $insertrow = self::$db->updateRow("UPDATE proyecto.plato SET plato.nombre = ?  WHERE plato.idplato = ? ", array( "{$nombre}",$id));
  }  

  function deletePlato($id) {    
    $deleterow = self::$db->deleteRow("DELETE FROM proyecto.plato WHERE idplato= ?", array("{$id}"));
  }  



}
?>

