<?
class ClsUsuario
	{		
		function ClsUsuario()
		{
			$this -> tabla = "";			
			$this -> nombreUsuario = "";
			$this -> apellidoUsuario = "";
			$this -> fechaNaciemientoUsuario = "";
			$this -> correoUsuario = "";
			$this -> claveUsuario = "";
			$this -> fechaCreacionUsuario = "";
			$this -> estadoUsuario = "";
		}
		
		function setTabla($c_tabla){
			$this -> tabla = $c_tabla ;
		}
		function setNombreUsuario($c_nombre_usuario){
			$this -> nombreUsuario = $c_nombre_usuario;
		}
		function setApellidoUsuario($c_apellidoUsuario){
			$this -> apellidoUsuario = $c_apellidoUsuario;
		}
		function setFechaNaciemientoUsuario($c_fechaNaciemientoUsuario){
			$this -> fechaNaciemientoUsuario = $c_fechaNaciemientoUsuario;
		}
		function setCorreoUsuario($c_correoUsuario){
			$this -> correoUsuario = $c_correoUsuario;
		}
		function setClaveUsuario($c_claveUsuario){
			$this -> claveUsuario = $c_claveUsuario;
		}
		function setFechaCreacionUsuario($c_fechaCreacionUsuario){
			$this -> fechaCreacionUsuario = $c_fechaCreacionUsuario;
		}
		function setEstadoUsuario($c_estadoUsuario){
			$this -> estadoUsuario = $c_estadoUsuario;
		}
		
		
		function getTabla(){
			return($this -> tabla);
		}
		function getNombreUsuario()	{
			return($this -> nombreUsuario);
		}
		function getApellidoUsuario()	{
			return($this -> apellidoUsuario);
		}
		function getFechaNaciemientoUsuario()	{
			return($this -> fechaNaciemientoUsuario);
		}
		function getCorreoUsuario(){
			return($this -> correoUsuario);
		}
		function getClaveUsuario()	{
			return($this -> claveUsuario);
		}
		function getFechaCreacionUsuario()	{
			return($this -> fechaCreacionUsuario);
		}
		function getEstadoUsuario()	{
			return($this -> estadoUsuario);
		}
	

		function cargar_datos()
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
			
			
	
			$consult="SELECT * FROM `usuario` where usu_correo='". $this -> getCorreoUsuario()."'";
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