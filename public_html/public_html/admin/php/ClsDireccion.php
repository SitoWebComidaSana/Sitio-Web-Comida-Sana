<?
class ClsDireccion
	{		
		function ClsDireccion()
		{
			$this -> idDireccion = "";			
			$this -> idUsuario = "";
			
			$this -> Sector = "";
			$this -> CallePrincipal = "";
			$this -> CalleTransversal = "";
			$this -> NumeroCasa = "";
			
			$this -> observacion = "";
			$this -> estadoDireccion = "";
		}
		
		function setIdDireccion($c_idDireccion){
			$this -> idDireccion = $c_idDireccion;
		}
		function setIdUsuario($c_id_usuario){
			$this -> idUsuario = $c_id_usuario;
		}
		function setSector($c_Sector){
			$this -> Sector = $c_Sector;
		}
		function setCallePrincipal($c_CallePrincipal){
			$this -> CallePrincipal = $c_CallePrincipal;
		}
		function setCalleTransversal($c_CalleTransversal){
			$this -> CalleTransversal = $c_CalleTransversal;
		}
		function setNumeroCasa($c_NumeroCasa){
			$this -> NumeroCasa = $c_NumeroCasa;
		}
		function setObservacion($c_observacion){
			$this -> observacion = $c_observacion;
		}		
		function setEstadoDireccion($c_estadoDireccion){
			$this -> estadoDireccion = $c_estadoDireccion;
		}
		
		
		function getIdDireccion(){
			return($this -> idDireccion);
		}
		function getIdUsuario()	{
			return($this -> idUsuario);
		}
		function getSector()	{
			return($this -> Sector);
		}
		function getCallePrincipal()	{
			return($this -> CallePrincipal);
		}
		function getCalleTransversal()	{
			return($this -> CalleTransversal);
		}
		function getNumeroCasa(){
			return($this -> NumeroCasa);
		}
		function getObservacion()	{
			return($this -> observacion);
		}		
		function getEstadoDireccion()	{
			return($this -> estadoDireccion);
		}
	

	
	

	
		function cargar_Direccion($_id)
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
							
			$consult="SELECT * FROM  `directorio_direccion` where `ddir_linea`='".$_id."'";
			
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
		
		function agregar_direccion($sector, $CallePrincipal, $CalleTransversal, $numero, $observacion)
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
							
			$consult="INSERT INTO `directorio_direccion` (`usu_codigo`, `ddir_sector`, `ddir_calle_principal`, `ddir_calle_transversal`, `ddir_numero`, `ddir_observacion`, `ddir_estado`) 
									VALUES ('".$_SESSION["id"]."', '".$sector."', '".$CallePrincipal."', '".$CalleTransversal."', '".$numero."', '".$observacion."', '1');";
			//"SELECT * FROM  `directorio_direccion` where `dtel_linea`='".$_id."'";
			
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
			var_dump($sentencia);
			return $resultado;
		}
		
		function actualizar_direccion($linea, $sector, $CallePrincipal, $CalleTransversal, $numero, $observacion)
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
							
			$consult="UPDATE `directorio_direccion` SET `ddir_sector`='".$sector."', `ddir_calle_principal`='".$CallePrincipal."', `ddir_calle_transversal`='".$CalleTransversal."',`ddir_numero`='".$numero."', `ddir_observacion`= '".$observacion."'	WHERE  `ddir_linea` ='".$linea."'; ";
									
//UPDATE  `u882124156_food`.`directorio_direccion` SET  `dtel_numero` =  '988633441',`dtel_observacion` =  'n.n.'
 //WHERE  `usu_codigo` =".$_SESSION["id"].";

			//"SELECT * FROM  `directorio_direccion` where `dtel_linea`='".$_id."'";
			
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