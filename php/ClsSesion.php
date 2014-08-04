<?
class ClsSesion
	{		
		function ClsSesion()
		{
			$this -> tabla = "";
			$this -> tbl_correo = "";
			$this -> tbl_clave = "";
			$this -> correo = "";
			$this -> clave = "";
			$this -> nombreUsuario = "";
			$this -> pagina_ok = "";
			$this -> pagina_error = "";			
			
			$this -> apellidoUsuario = "";
			$this -> fechaCreacionUsuario = "";
			
			/*
			tabla - campos - 
			correo - contraseña -			
			x iniciar sesion  - las paginas a redireccionar
			*/	
		}
		function setTabla($c_tabla){	
			$this -> tabla = $c_tabla ;
		}
		function setTbl_correo($c_tbl_correo){	
			$this -> tbl_correo= $c_tbl_correo;
		}
		function setTbl_clave($c_tbl_clave){	
			$this -> tbl_clave= $c_tbl_clave;
		}
		function setCorreo($c_correo){	
			$this -> correo = $c_correo;
		}
		function setClave($c_clave){	
			$this -> clave = $c_clave;	
		}
		function setNombreUsuario($c_nombre_usuario){	
			$this -> nombreUsuario = $c_nombre_usuario;
		}
		function setApellidoUsuario($c_apellidoUsuario){	
			$this -> apellidoUsuario = $c_apellidoUsuario;
		}
		function setFechaCreacionUsuario($c_fechaCreacionUsuario){	
			$this -> fechaCreacionUsuario = $c_fechaCreacionUsuario;
		}
		function setPagina_ok($c_pagina_ok){	
			$this -> pagina_ok = $c_pagina_ok;
		}
		function setPagina_error($c_pagina_error){	
			$this -> pagina_error = $c_pagina_error;
		}

		function getTabla(){
			return($this -> tabla);
		}
		function getTbl_correo(){
			return($this -> tbl_correo);
		}
		function getTbl_clave()	{
			return($this -> tbl_clave);
		}		
		function getCorreo(){
			return($this -> correo);
		}
		function getClave()	{
			return($this -> clave);
		}	
		function getNombreUsuario()	{
			return($this -> nombreUsuario);
		}
		function getApellidoUsuario()	{
			return($this -> apellidoUsuario);
		}
		function getFechaCreacionUsuario()	{
			return($this -> fechaCreacionUsuario);
		}
		function getPagina_ok()	{
			return($this -> pagina_ok);
		}
		function getPagina_error()	{
			return($this -> pagina_error);
		}			
	

		function validar_sesion()
		{	
			//Consulta si existe en la base el correo de la sesion actual - 
			//Devuelve el nombre o el mensaje: iniciar sesion
			session_start();
			date_default_timezone_set('utc');//fecha
			if(isset($_SESSION["_usuario"])){
				//echo "su usuario es:  ".$_SESSION['_usuario'];
			}else{
				$usuario =  date("Ymd").'/'.rand();
				$_SESSION["_usuario"] = $usuario;
			}
		
			if(isset($_SESSION["usuario"])){ //CON sesion
					include_once('InstConexion.php');
					$objeto = new  InstConexion();
					$objeto->Conectar();
					
					$consulta .= "select * from `";
					$consulta .= $this -> getTabla();
					$consulta .= "` where `";
					$consulta .= $this -> getTbl_correo();	//correo 'en sesion' se valida
					$consulta .= "` ='";
					$consulta .= $this -> getCorreo();	
					$consulta .= "'";
					$result = mysql_query($consulta);
					$row = mysql_fetch_array($result);	
				
					$this -> setNombreUsuario($row['usu_nombre']);	
					echo '<a href="'. $this -> getPagina_ok() . '" class="btn btn-link pull-left btn-login">Bienvenid@ '. $this -> getNombreUsuario()	.'.!</a>'; // con sesion
			}
			else{
					if(isset($_SESSION["_usuario"])) {		
						echo '<a href="'. $this -> getPagina_error() .'" class="btn btn-link pull-left btn-login">Iniciar Sesion</a>'; //sin sesion
					}
			}
		}
		
		function iniciar_sesion()
		{	
					include_once('InstConexion.php');
					$objeto = new  InstConexion();
					$objeto->Conectar();
					
					$consulta .= "select * from `";
					$consulta .= $this -> getTabla();
					$consulta .= "` where (`";
					$consulta .= $this -> getTbl_correo();	//correo 'en sesion' se valida
					$consulta .= "` ='";
					$consulta .= $this -> getCorreo();	
					$consulta .= "' and `";
					$consulta .= $this -> getTbl_clave();	
					
					$consulta .= "` ='";
					$consulta .= $this -> getClave();						
					$consulta .= "') ";
					
					$result = mysql_query($consulta);
					$row = mysql_fetch_array($result);
					$contar = mysql_num_rows($result);	
					return $contar;
		}	
		function validar_usuario()
		{	
					include_once('InstConexion.php');
					$objeto = new  InstConexion();
					$objeto->Conectar();
					
					$consulta .= "select * from `";
					$consulta .= $this -> getTabla();
					$consulta .= "` where `";
					$consulta .= $this -> getTbl_correo();	//correo 'en sesion' se valida
					$consulta .= "` ='";
					$consulta .= $this -> getCorreo();	
					$consulta .= "'";
					$result = mysql_query($consulta);
					$row = mysql_fetch_array($result);
					
					$contar = mysql_num_rows($result);	
					$this -> setNombreUsuario($row['usu_nombre']);	
					$this -> setApellidoUsuario($row['usu_apellido']);	
					$this -> setClave($row['usu_clave']);	
					$this -> setFechaCreacionUsuario($row['usu_fecha_creacion']);	
					
					return $contar;					
		}	
		
		function cerrar_sesion()
		{	
			session_start();
			session_destroy();
		}	
	}
?>