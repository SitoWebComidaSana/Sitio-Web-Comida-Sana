<?
class ClsConexion
	{		
		function ClsConexion()
		{
			$this -> servidor = "";
			$this -> base = "";
			$this -> usuario = "";
			$this -> clave = "";			
		}
		function setServidor($c_servidor){	
			$this -> servidor = $c_servidor ;
		}
		function setBase($c_base){	
			$this -> base= $c_base;
		}
		function setUsuario($c_usuario){	
			$this -> usuario = $c_usuario;
		}
		function setClave($c_clave){	
			$this -> clave = $c_clave;	
		}

		function getUsuario()
		{
			return($this -> usuario);
		}
		function getClave()
		{
			return($this -> clave);
		}
		
		function getBase()
		{
			return($this -> base);
		}
		function getServidor()
		{
			return($this -> servidor);
		}
	
		//mysql_select_db("EJEMPLO", @mysql_connect("localhost","root","root")
		function proceso()
		{	
		$Conexion_ID = @mysql_connect($this -> getServidor(), $this -> getUsuario(), $this -> getClave());
		if (!Conexion_ID){
			echo"Error NO. " .@mysql_errno()." : ".@mysql_error();
			exit;
		}else{
		}
		if(!@mysql_select_db($this -> getBase(),$Conexion_ID)){
			echo"Error NO. " .@mysql_errno()." : ".@mysql_error();
			exit;			
		}else{
		
			}			
		}		
	}
?>