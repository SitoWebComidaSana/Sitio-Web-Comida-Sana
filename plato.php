<?php
class plato {
 private $pla_codigo;
 private $pla_nombre;
 private $pla_descripcion;
 private $pla_precio;
 private $pla_estado;
 
 function __construct($idplato,$nombre,$descripcion,$precio, $precio){
  $this->pla_idplato = $idplato;
  $this->pla_nombre = $nombre;
  $this->pla_descripcion = $descripcion; 
  $this->pla_precio = $pla_precio;  
  $this->pla_estado = $pla_estado; 
  }
  
  function setPla_codigo(idplato){
    $this->pla_codigo= $idplato;
  }
 
  function getPla_codigo(){
    return $this->pla_codigo;
  }  
  
 
  
  function setPla_nombre(nombre){
    $this->pla_nombre= $nombre;
  }
  
  function getPla_nombre(){
    return $this->pla_nombre;
  }
 
  function setPla_descripcion(descripcion){
    $this->pla_descripcion= $descripcion;  }  
  
  function getPla_descripcion(){
    return $this->pla_escripcion;
  }
  
  function setPla_precio(precio){
    $this->pla_precio= $precio; 
  }  
  
  function getPla_precio(){
    return $this->pla_descripcion;
  }

  function setPla_estado(estado){
    $this->pla_estado= $estado; 
  }  
  
  function getPla_estado(){
    return $this->pla_estado;
  }
}
 
?>
