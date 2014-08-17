<?
class ClsReservalinea
	{		
		function ClsReservalinea()
		{
			$this -> nombre_reservacion = "";
			$this -> email_reservacion = "";
			$this -> dir_reservacion = "";
			$this -> num_telf_reservacion= "";
			$this -> num_per_reservacion = "";
			$this -> descrip_reservacion = "";
			$this -> estado_reservacion = "";			
			
		
			/*
			tabla - campos - 
			correo - contraseña -			
			x iniciar sesion  - las paginas a redireccionar
			*/	
		}
		function setnombre_reservacion ($c_nombre_reservacion ){	
			$this -> nombre_reservacion  = $c_nombre_reservacion ;
		}
		function setemail_reservacion($c_email_reservacion){	
			$this -> email_reservacion= $c_email_reservacion;
		}
		function setdir_reservacion($c_dir_reservacion){	
			$this -> dir_reservacion= $c_dir_reservacion;
		}
		function setnum_telf_reservacion($c_num_telf_reservacion){	
			$this -> num_telf_reservacion = $c_num_telf_reservacion;
		}
		function setnum_per_reservacion($c_num_per_reservacion){	
			$this -> num_per_reservacion = $c_num_per_reservacion;	
		}
		function setdescrip_reservacion($c_descrip_reservacion){	
			$this -> descrip_reservacion = $c_descrip_reservacion;
		}
		function setestado_reservacion($c_estado_reservacion){	
			$this -> estado_reservacion = $c_estado_reservacion;
		}
	
	/* gets*/

		function getnombre_reservacion(){
			return($this -> nombre_reservacion);
		}
		function getemail_reservacionTbl_correo(){
			return($this -> email_reservacion);
		}
		function getdir_reservacion()	{
			return($this -> dir_reservacion);
		}		
		function getnum_telf_reservacion(){
			return($this -> num_telf_reservacion);
		}
		function getnum_per_reservacion()	{
			return($this -> num_per_reservacion);
		}	
		function getdescrip_reservacion()	{
			return($this -> descrip_reservacion);
		}
		function getestado_reservacion()	{
			return($this -> estado_reservacion);
		}
		
	

/* ESTO VA EN OTRO LADO, COMO LO ESTAN MANEJANDO,, 

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
	} */
?>
