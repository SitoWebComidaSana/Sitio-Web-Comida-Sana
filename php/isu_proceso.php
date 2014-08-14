<?php
session_start();
$ajax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
$ajax = true;
if (!$ajax) {
		echo "Please enable Javascript";
		exit;
}
include_once('InstConexion.php');	
$objeto = new  InstConexion();	
$objeto->Conectar();		

$usu_correo = $_POST["email"];	
$usu_clave = $_POST["password"];$usu_clave = base64_encode($usu_clave);	

//Prcoeso por iniciar sesion	
if (isset($_POST["iniciar_sesion"]))
{
	
	include_once('ClsSesion.php'); //esta es la ruta donde esta la pagina php
	$objeto = new ClsSesion();	//instancio el objeto			
	$objeto ->setTabla("usuario");			
	$objeto ->setTbl_correo("usu_correo");
	$objeto ->setTbl_clave("usu_clave");
	$objeto ->setCorreo($usu_correo);
	$objeto ->setClave($usu_clave);			
	$contar = $objeto->iniciar_sesion();		
	
	if($contar == 0){
		header('Location: ../login.html');
    }else{
			if(isset($_SESSION["usuario"])){
				$_SESSION['_usuario']=  0;            
			}else{
				$_SESSION["usuario"] = $usu_correo;	$_SESSION["nombre"] = $row['usu_nombre'];			
			}
		header('Location: ../byb_account-my-orders.html');
	}	
}


//Proceso por solicitar clave
if (isset($_POST["enviar_clave"]))
{

	include_once('ClsSesion.php'); //esta es la ruta donde esta la pagina php
	$objeto = new ClsSesion();	//instancio el objeto		
	$objeto ->setTabla("usuario");			
	$objeto ->setTbl_correo("usu_correo");
	$objeto ->setCorreo($usu_correo);
	$contar = $objeto->validar_usuario();		
	
	//Si solicita y NO esta regiostrado
	if($contar == 0){		
		 require_once "../form/vendor/class.phpmailer.php"; 
		  $mail = new phpmailer();
		  $mail->From = "info@comidasana.net"; // dirección de correo y el nombre de usuario de la empresa
		  $mail->FromName = "Comida Sana";
		  $mail->Timeout=30;
		  $mail->AddAddress($usu_correo);		
		  $mail->Subject = "Te saludamos desde Comida Sana";  //asunto y cuerpo del mensaje en html
		  $mail->Body = "<b>Mensaje de aviso desde Comida Sana</b> <br><br><br>
			  <h1>Has solicitado recordar tu clave</h1> <br>
			  <h2>Te recordamos que aun no te has registrado con nosotros</h2>  <br><hr>
			  Has recibido este mensaje porque solicitaste una clave para iniciar sesion en nuestro sitio<br><br><br>  
			  <span >&copy; 2014 www.edcom.espol.edu.ec</span>";
		  $mail->AltBody = "Mensaje de confirmacion de registro";
		  $exito = $mail->Send();
		  $intentos=1; 
		  while ((!$exito) && ($intentos < 5)) {
			  sleep(5);
			  $exito = $mail->Send();
			  $intentos=$intentos+1;	
		  }
		  header('Location: ../byb_fail.html');
	//Si solicita y esta regiostrado
	}else{
		  require_once "../form/vendor/class.phpmailer.php"; 
		  $mail = new phpmailer();
		  $mail->From = "info@comidasana.net"; // dirección de correo y el nombre de usuario de la empresa
		  $mail->FromName = "Comida Sana";$mail->Timeout=30;
		  $mail->AddAddress($usu_correo);			
		  $mail->Subject = "Hola@ ".$objeto -> getNombreUsuario().' '.$objeto -> getApellidoUsuario();  //asunto y cuerpo del mensaje en html
		  $mail->Body = "<b>Mensaje desde Comida Sana</b> <br><br><br>
			  <h1>Te recordamos tus datos</h1> <br>
			  <h2>Informacion de Contacto: :</h2>  <br>
			  <b>Correo: ".$objeto -> getCorreo()."</b> <br>
			  <b>Clave: ". base64_decode($objeto -> getClave())."</b> <br>
			  <b>Fecha en que te unistes a nosotros: ".$objeto -> getFechaCreacionUsuario() ."</b> <br><br><br><hr>
			  Has recibido este mensaje porque olvidaste tu clave para iniciar sesion en nuestro sitio<br><br><br>  
			  <span >&copy; 2014 www.edcom.espol.edu.ec</span>";
		  $mail->AltBody = "Mensaje de confirmacion de registro";
		  $exito = $mail->Send();
		  $intentos=1; 
		  while ((!$exito) && ($intentos < 5)) {
			  sleep(5);
			  $exito = $mail->Send();
			  $intentos=$intentos+1;	
		  }	
		  header('Location: ../byb_recuperar_clave.html');
	}
}
exit;
?>