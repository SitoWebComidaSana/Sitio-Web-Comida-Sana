<?php
class plato{
 private $idplato;
 private $nombre;
 private $descripcion;
 
 function __construct($idplato,$nombre,$descripcion){
  $this->idplato = $idplato;
  $this->nombre = $nombre;
  $this->descripcion = $descripcion;  
  }
  
 
 function setIdplato($idPlato){
       $this->idplato = $idPlato;
 } 
 
  function getIdplato(){
    return $this->idplato;
  }  
  
 function setNombre($idNombre){
       $this->nombre = $idNombre;
     } 
  
  
  function getNombre(){
    return $this->nombre;
  }
 
    
  function setDescripcion($descripcion){
       $this->descripcion = $descripcion;
     } 
  function getDescripcion(){
    return $this->descripcion;
  }
  

 } 

 
?>
