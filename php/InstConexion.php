<? 
include_once('ClsConexion.php'); //esta es la ruta donde esta la pagina php
class InstConexion
	{		
		function Conectar()
		{
			$objeto = new ClsConexion();	//instancio el objeto		
			$objeto ->setServidor("localhost");			
			$objeto ->setBase("u882124156_food");//nombre de la base
			$objeto ->setUsuario("u882124156_elgl");
			$objeto ->setClave("VuhaXa");		
			$objeto->proceso();		//ejecuto el proceso del objeto		
		}
		
		
		function conectaBaseDatos(){
			try{
				$servidor = "localhost";
				$basedatos = "u882124156_food";//
				$usuario = "u882124156_elgl";//
				$contrasena = "VuhaXa";			
				$conexion = new PDO("mysql:host=$servidor;dbname=$basedatos",
									$usuario,
									$contrasena,
									array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));				
				$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
				return $conexion;
			}
			catch (PDOException $e){
				die ("No se puede conectar a la base de datos". $e->getMessage());
			}
		}
		
	}
?>