<?php
require_once("ClasesPHP/ClasesConexion/clsConexion.php");

class clsPersona
{
   
    --private $_nombres=null;
    --private $_apellidos=null;
    private $_direccion=null;
    private $_telefono=null;
    --private $_correo=null;
    
    private $_nickname=null;
    private $_contrasena=null;
    
    
    function __construct($nombres,$apellidos,$direccion,$telefono,$correo,$nickname,$contrasena)
    {
       
        $this->_nombres=$nombres;
        $this->_apellidos=$apellidos;
        $this->_direccion=$direccion;
        $this->_telefono=$telefono;
        $this->_correo=$correo;
        
        $this->_nickname=$nickname;
        $this->_contrasena=$contrasena;
        
    }
    
    
   
    
    public function GetNombres()
    {
        return $this->_nombres;
    }
    
    public function GetApellidos()
    {
        return $this->_apellidos;
    }
    
    public function GetDireccion()
    {
        return $this->_direccion;
    }
    
    public function GetTelefono()
    {
        return $this->_telefono;
    }
    
    
    public function GetCorreoElectronico()
    {
        return $this->_correo;
    }
    
   
    
    public function GetNickName()
    {
        return $this->_nickname;
    }
    
    
    public function GetPassword()
    {
        return $this->_contrasena;
    }
    
    
    
    public function RegistrarUsuario()
    {

        $objConexion=new clsConexion();
        
        $sql_insert="insert into tbl_usuario(Nombres,Apellidos,Direccion,Telefono,CorreoElectronico,NickName,Contrasena)";         
        $sql_values="values('".$this->GetNombres()."',"."'".$this->GetApellidos()."',"."'".$this->GetDireccion()."',"."'".$this->GetTelefono()."',".
                            "'".$this->GetCorreoElectronico()."','".$this->GetNickName()."',"."SHA1('".md5($this->GetPassword())."'),"."'".$this->GetFoto()."',"."'".$this->GetTipoFoto()."'".");";

        $respueta=$objConexion->EjecutarSQL($sql_insert.$sql_values);
        return $respueta;
    }
    
    
    
    
    
  
}

?>