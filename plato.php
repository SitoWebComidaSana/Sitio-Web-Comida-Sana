<?php
class plato{
 private $pla_codigo;
 private $pla_nombre;
 private $pla_descripcion;
 private $pla_precio;
 private $pla_estado;
 
 function __construct($idplato,$nombre,$descripcion,$precio, $precio){
  $this->pla_idplato = $idplato;
  $this->pla_nombre = $nombre;
  $this->pla_descripcion = $descripcion; 
  $this->pla_precio = $descripcion;  
  $this->descripcion = $descripcion; 
  }
  
  function setidPlato(idplato){
    $this->idplato= $idplato;
  }
 
  function getIdplato(){
    return $this->idplato;
  }  
  
 
  
  function setNombre(nombre){
    $this->nombre= $nombre;
  }
  
  function getNombre(){
    return $this->nombre;
  }
 
  function setDescripcion(descripcion){
    $this->descripcion= $descripcion;  }  
  
  function getDescripcion(){
    return $this->Descripcion;
  }
  
}
 
?>
