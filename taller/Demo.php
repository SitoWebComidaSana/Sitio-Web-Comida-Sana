<?php

class Demo
{
   
    private $nombre;
    private $apellido;
	private $imagen;
     function __construct($nombre, $apellido, $imagen) {
       
       $this->nombre = $nombre;
	   $this->apellido = $apellido;
	   $this->imagen = $imagen;
     }
    
   
     
     function setNombre($nombre){
       $this->nombre = $nombre;
     } 
     function getNombre(){
       return $this->nombre;
	   
     } 
	 
	 function setApellido($apellido){
       $this->apellido = $apellido;
     } 
     function getApellido(){
       return $this->apellido;
	   
	 function setImagen($imagen){
       $this->imagen = $imagen;
     } 
     function getImagen(){
       return $this->imagen;
	   
	   
}
}
?> 