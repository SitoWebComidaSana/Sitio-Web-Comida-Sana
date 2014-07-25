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
  
 
  function getIdplato(){
    return $this->idplato;
  }  
  
 
  
  
  function getName(){
    return $this->nombre;
  }
 
    
  
  function getDescripcion(){
    return $this->Descripcion;
  }
  
 } // end class plato
 
 // creando una instancia de plato
 
 $miplato = new plato ();
 print("<p> Nombre".$miplato->getName(). "</p>\n");
 
 print("<p>Changing name...</p>\n");
 $miplato->setName("plato-mio");
 print("<p> Nombre".$miplato->getName()."</p>\n");
 
 
 
?>
