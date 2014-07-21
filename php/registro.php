<?php
$ajax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
$ajax = true;
if (!$ajax) {
	echo "Please enable Javascript";
	exit;
}


	$usu_apellido = $_POST["apellido"];	$usu_nombre = $_POST["nombre"];	$usu_correo = $_POST["correo"];	
	$usu_clave = $_POST["clave"];	$usu_clave = base64_encode($usu_clave);
		
	include_once('InstConexion.php');	$objeto = new  InstConexion();	$objeto->Conectar();
$sql="INSERT INTO `u882124156_food`.`usuario` (`usu_nombre`, `usu_apellido`, `usu_correo`, `usu_clave`, `usu_estado`) 
VALUES ('".$usu_nombre."','".$usu_apellido."','".$usu_correo."','".$usu_clave."', 1)";

	$result = @mysql_query($sql);	

$resultado = array('success' => 1);
if ($result){// Envio de Correo de confirmacion
	  require_once "../form/vendor/class.phpmailer.php"; 
	  $mail = new phpmailer();
	  $mail->From = "info@buildyourbike.net"; // dirección de correo y el nombre de usuario de la empresa
	  $mail->FromName = "Comida Sana";
	  $mail->Timeout=30;
	  $mail->AddAddress($usu_correo);
	  	
	  $mail->Subject = "Bienvenid@ ".$usu_nombre." a Comida Sana";  //asunto y cuerpo del mensaje en html
	  $mail->Body = "<b>Mensaje de confirmacion de registro</b> <br><br><br>
		  <h1>Te damos la bienvenida a Comida Sana</h1> <br>
		  <h2>Informacion de Contacto: :</h2>  <br>
   	      <b>Correo: ".$_POST["correo"]."</b> <br>
  	      <b>Clave: ".$_POST["clave"]."</b> <br><br><br>
		  <hr>
		  Has recibido este mensaje porque creaste una cuenta con nosotros<br><br><br>  
 <span >&copy; 2014 www.edcom.espol.edu.ec</span>";// Informacion de Contacto: <br> Correo electronico: ".$usu_correo."<br> ";
	  $mail->AltBody = "Mensaje de confirmacion de registro";

	  $exito = $mail->Send();
      $intentos=1; 
	  while ((!$exito) && ($intentos < 5)) {
		  sleep(5);
		  $exito = $mail->Send();
		  $intentos=$intentos+1;	
	  }		
/*	  if(!$exito){
		//echo "Problemas enviando correo electrónico a ".$valor;
		///echo "<br/>".$mail->ErrorInfo;	
	  }else{
		///echo "Mensaje enviado correctamente";
	  } */
	
		$resultado['success'] = 1;
	
}else{
	echo json_encode(array('errors' => 0));
	exit;
}
echo json_encode($resultado);
exit;