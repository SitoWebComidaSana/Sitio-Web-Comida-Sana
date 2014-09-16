<?php

	session_start();

	include_once('ClsSesion.php'); //esta es la ruta donde esta la pagina php
	$objeto = new ClsSesion();	//instancio el objeto
			
	$objeto->cerrar_sesion();	
	
  ?> 