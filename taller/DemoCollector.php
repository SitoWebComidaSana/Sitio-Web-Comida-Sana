<?php

include_once('Demo.php');
include_once('Collector.php');

class DemoCollector extends Collector
{
  
  function showDemo($id) {
    $row = self::$db->getRows("SELECT * FROM demo where iddemo= ? ", array("{$id}")); 
    $ObjDemo = new Demo($row[0]{'iddemo'},$row[0]{'nombre'});
    return $ObjDemo;
  }

  function createDemo($nombre, $apellido, $imagen) {    
    $insertrow = self::$db->insertRow("INSERT INTO prueba.usuario (nombre, apellido, imagen) VALUES (?, ?, ?)", array( "{$nombre}", $apellido, $imagen));
  }  

  function readDemos() {
    $rows = self::$db->getRows("SELECT * FROM demo ");        
    $arrayDemo= array();        
    foreach ($rows as $c){
      $aux = new Demo($c{'iddemo'},$c{'nombre'});
      array_push($arrayDemo, $aux);
    }
    return $arrayDemo;        
  }
  
  function updateDemo($id,$nombre) {    
    $insertrow = self::$db->updateRow("UPDATE clasedb.demo SET demo.nombre = ?  WHERE demo.iddemo = ? ", array( "{$nombre}",$id));
  }  

  function deleteDemo($id) {    
    $deleterow = self::$db->deleteRow("DELETE FROM clasedb.demo WHERE iddemo= ?", array("{$id}"));
  }  



}
?>

