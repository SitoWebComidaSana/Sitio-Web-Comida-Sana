<?php
	/*session_start();
	date_default_timezone_set('utc');		
	if(isset($_SESSION["_usuario"])){
		//echo "su usuario es:  ".$_SESSION['_usuario'];            
	}else{
		$usuario =  date("Ymd").'/'.rand();
		$_SESSION["_usuario"] = $usuario;
	}
///////////////////////////////////////
if(isset($_SESSION["usuario"])){ 	
	include_once('InstConexion.php');
	$objeto = new  InstConexion();	
	$objeto->Conectar();
	
	$result = mysql_query("select * from `usuario` where `usu_correo` ='".$_SESSION["usuario"]."'"); 	
    $row = mysql_fetch_array($result);
	$_SESSION["nombre"] = $row['usu_nombre'];	
	$usuario_activo = $row['usu_nombre'];		
	echo '<a href="byb_account-my-orders.html" class="btn btn-link pull-left btn-login">Bienvenid@ '.$usuario_activo.'!</a>'; // con sesion
}
else{
	if(isset($_SESSION["_usuario"])) {		
		echo '<a href="byb_login.html" class="btn btn-link pull-left btn-login">Login</a>'; //sin sesion
	}
}*/
session_start();

	include_once('ClsSesion.php'); //esta es la ruta donde esta la pagina php
	$objeto = new ClsSesion();	//instancio el objeto
			
	$objeto ->setTabla("usuario");			
	$objeto ->setTbl_correo("usu_correo");
	$objeto ->setTbl_clave("usu_clave");
	$objeto ->setCorreo($_SESSION["usuario"]);
	$objeto ->setClave($_SESSION["clave"]);			
	$objeto ->setPagina_ok("byb_account-my-orders.html");
	$objeto ->setPagina_error("login.html");


	$objeto->sesion();				//ejecuto el proceso del objeto


?> 