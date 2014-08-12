<?php
include clsConexion.php;
include plato.php;
class PlatoCollector {



 public function ConsultarUsuariosConectados()
    {
        $objConexion=new clsConexion();
        $sql="SELECT idplato FROM tbl_usuario WHERE plato;
        $resultset_conectados=$objConexion->EjecutarSQL($sql);
        return $resultset_conectados;
    }

public function mostrar()
    {
        $objConexion=new clsConexion();
        $sql="SELECT id_ingrediente FROM tbl_ingrediente ";
        $resultset_ingrediente = $objConexion->EjecutarSQL($sql);
        return $resultset_ingrediente;
    }
    
public function mostrar()        
   {   

       	objConexion= new clsConexion();
       	$sql="select pag_codigo FROM forma_de_pago";
	       $resultset_forma_de_pago= $objConexion -> EjecutarSQL();
        	return $Resulst_forma_de_pago;
   }
?>
