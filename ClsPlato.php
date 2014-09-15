<?
class ClsPlato
	{		
		function ClsPlato()
		{
			$this -> codigo = "";			
			$this -> nombre = "";
			$this -> descripcion = "";
			$this -> precio = "";
		}
		
		function setcodigo($c_codigo){
			$this -> codigo = $c_codigo;
		}
		function setnombre($c_nombre){
			$this -> nombre = $c_nombre;
		}
		function setdescripcion($c_descripcion){
			$this -> descripcion = $c_descripcion;
		}
		function setprecio($c_precio){
			$this -> precio = $c_precio;
		}
		
		
		function getcodigo(){
			return($this -> codigo);
		}
		function getnombre()	{
			return($this -> nombre);
		}
		function getdescripcion()	{
			return($this -> descripcion);
		}
		function getprecio()	{
			return($this -> precio);
		}


	
	

	
		function cargar_Plato($_id)
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
		
		function agregar_Plato($localidad, $tipo, $precio, $numero, $observacion)
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
									VALUES ('".$_SESSION["id"]."', '".$tipo."', '".$precio."', '".$numero."', '".$localidad."', '".$observacion."', '1');";
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
		
		function actualizar_Plato($localidad, $tipo, $precio, $numero, $observacion, $linea)
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
							
			$consult="UPDATE `directorio_telefonico` SET `dtel_tipo`='".$tipo."', `dtel_codigo_de_area`='".$precio."', `dtel_numero`='".$numero."',`dtel_localidad`='".$localidad."', `dtel_observacion`= '".$observacion."'	WHERE  `dtel_linea` ='".$linea."'; ";
									
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