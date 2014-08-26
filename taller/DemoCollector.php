<?php

include_once('Demo.php');
include_once('Collector.php');

class DemoCollector extends Collector
{
  
  function showDemo($id) {
    $row = self::$db->getRows("SELECT * FROM enfermedad where enf_codigo= ? ", array("{$id}")); 
    $ObjDemo = new Demo($row[0]{'enf_codigo'},$row[0]{'enf_descripcion'},$row[0]{'enf_estado'});
    return $ObjDemo;
  }

  function createDemo($descripcion) {    
    $insertrow = self::$db->insertRow("INSERT INTO comida.enfermedad (enf_codigo, enf_descripcion, enf_estado) VALUES (?, ?)", array(null, "{$descripcion}"));
  }  

  function readDemos() {
    $rows = self::$db->getRows("SELECT * FROM enfermedad ");        
    $arrayDemo= array();        
    foreach ($rows as $c){
      $aux = new Demo($c{'enf_codigo'},$c{'enf_descripcion'},$c{'enf_estado'});
      array_push($arrayDemo, $aux);
    }
    return $arrayDemo;        
  }
  
  function updateDemo($id,$descripcion) {    
    $insertrow = self::$db->updateRow("UPDATE comida.enfermedad SET enfermedad.descripcion = ?  WHERE enfermedad.enf_codigo = ? ", array( "{$descripcion}",$id));
  }  

  function deleteDemo($id) {    
    $deleterow = self::$db->deleteRow("DELETE FROM comida.enfermedad WHERE enf_codigo= ?", array("{$id}"));
  }  



}
?>

