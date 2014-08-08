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

?>
