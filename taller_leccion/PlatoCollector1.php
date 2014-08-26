<?php
include database.php;
include plato.php;
class PlatoCollector1 {




   function createPlato($nombre) {    
    $insertrow = self::$db->insertRow("INSERT INTO proyecto.plato ( nombre, descripcion,imagen) VALUES (?, ?, ?)", array("{$nombre}","{$descripcion}", "{$imagen}"));
  }  
  public function mostrar()
    {
        $objConexion=new clsConexion();
        $sql="SELECT nombre FROM plato ";
        $resultset_plato = $objConexion->EjecutarSQL($sql);
        return $resultset_plato;
    }
    
 function showPlato($id) {
    $row = self::$db->getRows("SELECT * FROM plato where nombre= ? ", array("{$nombre}")); 
    $ObjPlato = new plato($nombre[0]{'nombre'},$descripcion[0]{'descripcion'},$imagen[0]{'imagen'});
    return $ObjPlato;
  }
?>
