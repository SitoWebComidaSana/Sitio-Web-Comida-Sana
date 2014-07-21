<?php
session_start();

$ajax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
$ajax = true;
if (!$ajax) {
		echo "Please enable Javascript";
		exit;
}
	include_once('InstConexion.php');	$objeto = new  InstConexion();	$objeto->Conectar();		
	$usu_correo = $_POST["email"];	


if (isset($_POST["iniciar_sesion"]))
{
	$usu_clave = $_POST["password"];	$usu_clave = base64_encode($usu_clave);	
	$sql = "select * from `usuario` where (`usu_correo` ='".$usu_correo."' and `usu_clave` ='".$usu_clave."')"; 
	$result = @mysql_query($sql);	$contar = mysql_num_rows($result);	$row = mysql_fetch_array($result);
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
if (isset($_POST["enviar_clave"]))
{
	$sql = "select * from `tbl_usuario` where `usu_correo` ='".$usu_correo."'"; 
	$result = @mysql_query($sql);	$contar = mysql_num_rows($result);	$row = mysql_fetch_array($result);
	if($contar == 0){		

		 require_once "../form/vendor/class.phpmailer.php"; 
		  $mail = new phpmailer();
		  $mail->From = "info@buildyourbike.net"; // dirección de correo y el nombre de usuario de la empresa
		  $mail->FromName = "Builld  Your Bike";
		  $mail->Timeout=30;
		  $mail->AddAddress($usu_correo);
			
		  $mail->Subject = "Te saludamos desde Builld Your Bike";  //asunto y cuerpo del mensaje en html
		  $mail->Body = "<b>Mensaje de aviso desde Builld  Your Bike</b> <br><br><br>
			  <h1>Has solicitado recordar tu clave</h1> <br>
			  <h2>Te recordamos que aun no te has registrado con nosotros</h2>  <br>			 
			  <hr>
			  Has recibido este mensaje porque solicitaste una clave para iniciar sesion en nuestro sitio<br>
			  <br><br>  
	 <span >&copy; 2014 BuildYourBike.net</span>";
	 $mail->AltBody = "Mensaje de confirmacion de registro";
		  $exito = $mail->Send();
		  $intentos=1; 
		  while ((!$exito) && ($intentos < 5)) {
			  sleep(5);
			  $exito = $mail->Send();
			  $intentos=$intentos+1;	
		  }	
		  
header('Location: ../byb_fail.html');
		
	}else{
		 require_once "../form/vendor/class.phpmailer.php"; 
		  $mail = new phpmailer();
		  $mail->From = "info@buildyourbike.net"; // dirección de correo y el nombre de usuario de la empresa
		  $mail->FromName = "Builld  Your Bike";
		  $mail->Timeout=30;
		  $mail->AddAddress($usu_correo);
			
		  $mail->Subject = "Hola@ ".$row['usu_nombre'].' '.$row['usu_apellido'];  //asunto y cuerpo del mensaje en html
		  $mail->Body = "<b>Mensaje desde Builld  Your Bike</b> <br><br><br>
			  <h1>Te recordamos tus datos</h1> <br>
			  <h2>Informacion de Contacto: :</h2>  <br>
			  <b>Correo: ".$row['usu_correo']."</b> <br>
			  <b>Clave: ". base64_decode($row['usu_clave'])."</b> <br>
			  <b>Fecha en que te unistes a nosotros: ".$row['usu_fecha_creacion']."</b> <br><br><br>
			  <hr>
			  Has recibido este mensaje porque olvidaste tu clave para iniciar sesion en nuestro sitio<br><br><br>  
	 <span >&copy; 2014 BuildYourBike.net</span>";
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
