<?php

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

	$objeto->validar_sesion();		//ejecuto el proceso del objeto
?> 