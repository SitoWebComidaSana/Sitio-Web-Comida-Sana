<?php
class plato{

 private $plato;
 private $descripcion;
 private $imagen;

 
 function __construct($nombre,$descripcion,$imagen){

  $this->nombre = $nombre;
  $this->descripcion = $descripcion; 
  $this->imagen = $imagen;  
  
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
  
  function setiImagen(imagen){
    $this->imagen= $imagen;
  }
 
  function getImagen(){
    return $this->imagen;
  }  

 
?>
