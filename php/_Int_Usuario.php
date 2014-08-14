<?php
	session_start();
	date_default_timezone_set('utc');		
	if(isset($_SESSION["_usuario"])){
		//echo "su usuario es:  ".$_SESSION['_usuario'];            
	}else{
		$usuario =  date("Ymd").'/'.rand();
		$_SESSION["_usuario"] = $usuario;
	}
	
	
	
if(isset($_POST['Consulta'])){	

	
	include_once('ClsUsuario.php'); //esta es la ruta donde esta la pagina php
	$objeto = new ClsUsuario();	//instancio el objeto
	
	$objeto ->setCorreoUsuario($_SESSION["usuario"]);
	$resultado = $objeto->cargar_datos();		//ejecuto el proceso del objeto
	
	foreach($resultado as $indice => $registro){
		$html .= '<div class="col-md-6 col-sm-9 space-left-30">
                  <h2 class="strong-header large-header">Edita la informacion de la cuenta</h2>
                  <form role="form" action="actualizar_registro.php" method="post" novalidate>
                      <div class="form-group">
                          <label for="first-name">Nombres</label>
                          <input type="text" class="form-control" id="first-name" required value="'.$registro['usu_nombre'].'">
                      </div>
                      <div class="form-group">
                          <label for="last-name">Apellido</label>
                          <input type="text" class="form-control" id="last-name" required value="'.$registro['usu_apellido'].'">
                      </div>
                      <div class="form-group">
                          <label for="email">Correo Electronico</label>
                          <input type="email" class="form-control" id="email" required value="'.$registro['usu_correo'].'">
                      </div>
                      <div class="form-group">
                          <label for="password">Nueva Contraseña</label>
                          <input type="password" class="form-control" id="password" required>
                      </div>                      
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                  </form>
              </div>';
          
		
	}      
	
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);
		echo json_encode($respuesta);
	}

?> 




