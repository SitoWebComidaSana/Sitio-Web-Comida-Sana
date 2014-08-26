<?php

class Demo
{
<<<<<<< HEAD
    private $enf_codigo;
    private $enf_descripcion;
    
     function __construct($enf_codigo, $enf_descripcion, $enf_estado) {
       $this->enf_codigo = $enf_codigo;
       $this->enf_descripcion = $enf_descripcion;
        $this->enf_estado = $enf_estado;
     }
    
     function setenf_codigo($enf_codigo){
       $this->enf_codigo = $enf_codigo;
     } 
     function getIdenf_codigo(){
       return $this->enf_codigo;
     } 
     function setenf_descripcion($enf_descripcion){
       $this->enf_descripcion = $enf_descripcion;
     } 
     function getenf_descripcion(){
       return $this->enf_descripcion;
     } 
      function setenf_estado($enf_estado){
       $this->enf_estado = $enf_estado;
     } 
     function getenf_estado(){
       return $this->enf_estado;
     }
}

?> 
=======
   
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
>>>>>>> a3fecae8413a96fd1df6e43b6b218b76e7250b8c
