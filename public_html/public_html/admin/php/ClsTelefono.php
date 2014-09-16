<?
class ClsTelefono
	{		
		function ClsTelefono()
		{
			$this -> idTelefono = "";			
			$this -> idUsuario = "";
			$this -> tipoTelefono = "";
			$this -> codigoArea = "";
			$this -> numeroTelefono = "";
			$this -> localidad = "";
			$this -> observacion = "";
			$this -> estadoTelefono = "";
		}
		
		function setIdTelefono($c_idTelefono){
			$this -> idTelefono = $c_idTelefono;
		}
		function setIdUsuario($c_id_usuario){
			$this -> idUsuario = $c_id_usuario;
		}
		function setTipoTelefono($c_tipoTelefono){
			$this -> tipoTelefono = $c_tipoTelefono;
		}
		function setCodigoArea($c_codigoArea){
			$this -> codigoArea = $c_codigoArea;
		}
		function setNumeroTelefono($c_numeroTelefono){
			$this -> numeroTelefono = $c_numeroTelefono;
		}
		function setLocalidad($c_localidad){
			$this -> localidad = $c_localidad;
		}
		function setObservacion($c_observacion){
			$this -> observacion = $c_observacion;
		}		
		function setEstadoTelefono($c_estadoTelefono){
			$this -> estadoTelefono = $c_estadoTelefono;
		}
		
		
		function getIdTelefono(){
			return($this -> idTelefono);
		}
		function getIdUsuario()	{
			return($this -> idUsuario);
		}
		function getTipoTelefono()	{
			return($this -> tipoTelefono);
		}
		function getCodigoArea()	{
			return($this -> codigoArea);
		}
		function getNumeroTelefono()	{
			return($this -> numeroTelefono);
		}
		function getLocalidad(){
			return($this -> localidad);
		}
		function getObservacion()	{
			return($this -> observacion);
		}		
		function getEstadoTelefono()	{
			return($this -> estadoTelefono);
		}
	

	
	

	
		function cargar_telefono($_id)
		{	
			session_start();
			date_default_timezone_set('utc');//fecha
			if(isset($_SESSION["_usuario"])){}
			else{
				$usuario =  date("Ymd").'/'.rand();
				$_SESSION["_usuario"] = $usuario;
			}
			
			include_once('InstConexion.php');
			$objeto = new  InstConexion();
			$objeto->Conectar();			
							
			$consult="SELECT * FROM  `directorio_telefonico` where `dtel_linea`='".$_id."'";
			
			$resultado = false;
			$conexion = $objeto->conectaBaseDatos();
			$sentencia = $conexion->prepare($consult);
			try {
				if(!$sentencia->execute()){
					print_r($sentencia->errorInfo());
				}
				$resultado = $sentencia->fetchAll();
				$sentencia->closeCursor();
			}
			catch(PDOException $e){
				echo "Error al ejecutar la sentencia: \n";
					print_r($e->getMessage());
			}
			return $resultado;
		}
		
		function agregar_telefono($localidad, $tipo, $codigoarea, $numero, $observacion)
		{	
			session_start();
			date_default_timezone_set('utc');//fecha
			if(isset($_SESSION["_usuario"])){}
			else{
				$usuario =  date("Ymd").'/'.rand();
				$_SESSION["_usuario"] = $usuario;
			}
			
			include_once('InstConexion.php');
			$objeto = new  InstConexion();
			$objeto->Conectar();			
							
			$consult="INSERT INTO `directorio_telefonico` (`usu_codigo`, `dtel_tipo`, `dtel_codigo_de_area`, `dtel_numero`, `dtel_localidad`, `dtel_observacion`, `dtel_estado`) 
									VALUES ('".$_SESSION["id"]."', '".$tipo."', '".$codigoarea."', '".$numero."', '".$localidad."', '".$observacion."', '1');";
			//"SELECT * FROM  `directorio_telefonico` where `dtel_linea`='".$_id."'";
			
			$resultado = false;
			$conexion = $objeto->conectaBaseDatos();
			$sentencia = $conexion->prepare($consult);
			try {
				if(!$sentencia->execute()){
					print_r($sentencia->errorInfo());
				}
				$resultado = $sentencia->fetchAll();
				$sentencia->closeCursor();
			}
			catch(PDOException $e){
				echo "Error al ejecutar la sentencia: \n";
					print_r($e->getMessage());
			}
			return $resultado;
		}
		
		function actualizar_telefono($localidad, $tipo, $codigoarea, $numero, $observacion, $linea)
		{	
			session_start();
			date_default_timezone_set('utc');//fecha
			if(isset($_SESSION["_usuario"])){}
			else{
				$usuario =  date("Ymd").'/'.rand();
				$_SESSION["_usuario"] = $usuario;
			}
			
			include_once('InstConexion.php');
			$objeto = new  InstConexion();
			$objeto->Conectar();			
							
			$consult="UPDATE `directorio_telefonico` SET `dtel_tipo`='".$tipo."', `dtel_codigo_de_area`='".$codigoarea."', `dtel_numero`='".$numero."',`dtel_localidad`='".$localidad."', `dtel_observacion`= '".$observacion."'	WHERE  `dtel_linea` ='".$linea."'; ";
									
//UPDATE  `u882124156_food`.`directorio_telefonico` SET  `dtel_numero` =  '988633441',`dtel_observacion` =  'n.n.'
 //WHERE  `usu_codigo` =".$_SESSION["id"].";

			//"SELECT * FROM  `directorio_telefonico` where `dtel_linea`='".$_id."'";
			
			$resultado = false;
			$conexion = $objeto->conectaBaseDatos();
			$sentencia = $conexion->prepare($consult);
			try {
				if(!$sentencia->execute()){
					print_r($sentencia->errorInfo());
				}
				$resultado = $sentencia->fetchAll();
				$sentencia->closeCursor();
			}
			catch(PDOException $e){
				echo "Error al ejecutar la sentencia: \n";
					print_r($e->getMessage());
			}
			return $resultado;
		}
	
	}
?>