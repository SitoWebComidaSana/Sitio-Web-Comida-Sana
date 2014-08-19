<?php

class Demo
{
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
