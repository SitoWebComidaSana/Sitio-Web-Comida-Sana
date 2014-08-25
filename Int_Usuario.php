<?php
	session_start();
	date_default_timezone_set('utc');		
	if(isset($_SESSION["_usuario"])){
		//echo "su usuario es:  ".$_SESSION['_usuario'];            
	}else{
		$usuario =  date("Ymd").'/'.rand();
		$_SESSION["_usuario"] = $usuario;
	}
	
	
	if(isset($_POST['ConsultarPerfil'])){		
		include_once('ClsUsuario.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsUsuario();	//instancio el objeto
		
		$objeto ->setCorreoUsuario($_SESSION["usuario"]);
		$resultado = $objeto->cargar_perfil();		//ejecuto el proceso del objeto			
		foreach($resultado as $indice => $registro){
				$html .= '<div class="col-md-6 col-sm-9 space-left-30">
					  <h2 class="strong-header large-header">Edita la informacion de la cuenta</h2>
					  <form role="form" action="php/Int_Usuario.php" method="post" novalidate>
						  <div class="form-group">
							  <label for="first-name">Nombres</label>
							  <input type="text" class="form-control" id="first-name" name="first-name" required value="'.$registro['usu_nombre'].'">
						  </div>
						  <div class="form-group">
							  <label for="last-name">Apellidos</label>
							  <input type="text" class="form-control" id="last-name" name="last-name" value="'.$registro['usu_apellido'].'" required>
						  </div>
						  <div class="form-group">
							  <label for="email">Correo Electronico</label>
							  <input type="email" class="form-control" id="email" name="email" value="'.$registro['usu_correo'].'" required>
						  </div>
						  <div class="form-group">
							  <label for="password">Nueva clave</label>
							  <input type="password" class="form-control" id="password" name="password" required>
						  </div>
						  
						  <div class="form-group">
								<label for="fecha_nac">Fecha Nacimiento</label>
								<input type="date" class="form-control" name="fecha_nac" id="fecha_nac" step="1" max="2014-12-31T12:00Z" value="'.$registro['usu_fecha_nacimiento'].'" required>				
								 
						  </div>
						  
						  <button type="submit" name="actualizar_usuario" class="btn btn-primary">Actualizar</button>
					  </form>
				  </div>'; 	
		}      
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);
	}
			
	if(isset($_POST['Consultar_DetalleDireccion'])){
		include_once('ClsUsuario.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsUsuario();	//instancio el objeto
				
		$resultado = $objeto->cargar_perfil_detalle_direccion($_SESSION["id"]);		//ejecuto el proceso del objeto			
		$html .= '<div class="col-md-6 col-sm-9 space-left-30">
					  <h2 class="strong-header large-header">Lista de Direcciones</h2> <button type="button" name="nuevo" onclick="nuevo_d()" class="btn btn-success btn-primary btn-mini">Agregar Nuevo</button>  ';
		$html .= '<div class="table">
						  <table>
							<thead>
							<tr>
							  <td></td>
							  <td>Sector</td>
							  <td>Calle Principal - </td>
							  <td>Calle Transversal</td>
							  <td>Numero </td>
							  <td>Observacion</td>	
							  <td>
							  </td>						  
							</tr>
							</thead>
							<tbody>';
							$i=0;
		foreach($resultado as $indice => $registro){
			$i=$i+1;
				$html .= '	<tr>							  
							  <td><a href="javascript:editar_d('.$registro['ddir_linea'].');">'.$i.'</a></td>
							  <td>'.$registro['ddir_sector'].'</td>							  
							  <td>'.$registro['ddir_calle_principal'].'</td>
							  <td>'.$registro['ddir_calle_transversal'].'</td>
							  <td>'.$registro['ddir_numero'].'</td>
							  <td>'.$registro['ddir_observacion'].'</td>
							</tr>';				  
		}      
		$html .= '</tbody> </table> </div> </div>';
		
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);
	}
	
	if(isset($_POST['Consultar_DetalleEnvio'])){
		include_once('ClsUsuario.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsUsuario();	//instancio el objeto
		
		
		$resultado = $objeto->cargar_perfil_detalle_telefono($_SESSION["id"]);		//ejecuto el proceso del objeto			
		$html .= '<div class="col-md-6 col-sm-9 space-left-30">
					  <h2 class="strong-header large-header">Lista de Telefonos</h2>   ';
		$html .= '<div class="table">
						  <table>
							<thead>
							<tr>
							  <td></td>
							  <td>Tipo</td>
							  <td>Codigo de Area</td>
							  <td>Numero Telefonico</td>
							  <td>Observacion</td>	<td><button type="button" name="nuevo" onclick="nuevo()" class="btn btn-success btn-primary btn-mini">Agregar Nuevo</button></td>						  
							</tr>
							</thead>
							<tbody>';
		foreach($resultado as $indice => $registro){
				$html .= '	<tr>							  
							  <td><a href="javascript:editar('.$registro['dtel_linea'].');">'.$registro['dtel_localidad'].'</a></td>
							  <td>'.$registro['dtel_tipo'].'</td>
							  <td>'.$registro['dtel_codigo_de_area'].'</td>
							  <td>'.$registro['dtel_numero'].'</td>
							  <td>'.$registro['dtel_observacion'].'</td>
							</tr>';				  
		}      
		$html .= '</tbody> </table> </div> </div>';
		
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);
	}
	
	if(isset($_POST['Consulta_Especifica_Telefono'])){		
		include_once('ClsTelefono.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsTelefono();	//instancio el objeto				
		$id = $_POST['Consulta_Especifica_Telefono'];
		$resultado = $objeto->cargar_telefono($_POST['Consulta_Especifica_Telefono']);		//ejecuto el proceso del objeto			
		foreach($resultado as $indice => $registro){		
			$html .= '<div class="col-md-6 col-sm-9 space-left-30">
					  <h2 class="strong-header large-header">Completa tus datos</h2>
					  <form role="form" action="php/Int_Usuario.php" method="post" novalidate>
						<input type="hidden" name="codigo" id="codigo" value="'.$id.'">
						<div class="form-group">
							<label for="localidad">Telefono</label>
							<select class="form-control" id="localidad" name="localidad">
								  <option value="Personal" ';
							if($registro['dtel_localidad']== 'Personal'){	$html.='selected';}
							$html.='>Personal</option>
								  <option value="Casa" ';
							if($registro['dtel_localidad']== 'Casa'){	$html.='selected';}
							$html.='>Casa</option>
								  <option value="Trabajo" ';
							if($registro['dtel_localidad']== 'Trabajo'){	$html.='selected';}
							$html.='>Trabajo</option>
								  <option value="Otro" ';
							if($registro['dtel_localidad']== 'Otro'){	$html.='selected';}
							$html.='>Otro</option>
							</select>
						</div>

						<div class="form-group">
							<label for="tipo">Telefono</label>
							<select class="form-control" id="tipo" name="tipo">
								  <option value="Convencional" ';
							if($registro['dtel_tipo']== 'Convencional'){	$html.='selected';}	
							$html.='>Telefono Convencional</option>
								  <option value="Movil" ';
							if($registro['dtel_tipo']== 'Movil'){	$html.='selected';}	  
							$html.='>Telefono Movil</option>						
							</select>
						</div>
						
							<div class="form-group">
							  <label for="first-name">Codigo de area</label>
							  <input type="text" class="form-control" id="codigoarea" name="codigoarea" required value="'.$registro['dtel_codigo_de_area'].'">
							</div>
						  
							<div class="form-group">
							  <label for="last-name">Numero Telefonico</label>
							  <input type="text" class="form-control" id="numero" name="numero" value="'.$registro['dtel_numero'].'" required>						
							</div>			  					 						

							<div class="form-group">
							  <label for="last-name">Observacion</label>
							  <input type="text-area" class="form-control" id="observacion" name="observacion" value="'.$registro['dtel_observacion'].'" required>						
							</div>	
							
						  <button type="submit" name="actualizar_telefono" class="btn btn-primary">Actualizar</button>
					  </form>			 ';		
		
				$html .= '</div>';
		}
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);		
	}
	
	if(isset($_POST['Nuevo_Telefono'])){
	//	include_once('ClsTelefono.php'); //esta es la ruta donde esta la pagina php
	//	$objeto = new ClsTelefono();	//instancio el objeto			
	//	$resultado = $objeto->cargar_telefono($_POST['Consulta_Especifica_Telefono']);		//ejecuto el proceso del objeto			
				
		$html .= '<div class="col-md-6 col-sm-9 space-left-30">
					  <h2 class="strong-header large-header">Completa tus datos</h2>
					  <form role="form" action="php/Int_Usuario.php" method="post" novalidate>						
						<div class="form-group">
							<label for="localidad">Telefono</label>
							<select class="form-control" id="localidad" name="localidad">
								  <option value="Personal" selected>Personal</option>
								  <option value="Casa">Casa</option>
								  <option value="Trabajo">Trabajo</option>
								  <option value="Otro">Otro</option>
							</select>
						</div>
						<div class="form-group">
							<label for="tipo">Telefono</label>
							<select class="form-control" id="tipo" name="tipo">
								  <option value="Convencional" selected>Telefono Convencional</option>
								  <option value="Movil" >Telefono Movil</option>						
							</select>
						</div>						
							<div class="form-group">
							  <label for="first-name">Codigo de area</label>
							  <input type="text" class="form-control" id="codigoarea" name="codigoarea" required>
							</div>
						  
							<div class="form-group">
							  <label for="last-name">Numero Telefonico</label>
							  <input type="text" class="form-control" id="numero" name="numero" required>						
							</div>			  					 						

							<div class="form-group">
							  <label for="last-name">Observacion</label>
							  <input type="text-area" class="form-control" id="observacion" name="observacion" required>						
							</div>	
							
						  <button type="submit" name="agregar_telefono" class="btn btn-primary">Agregar</button>
					  </form>			 ';		
		
				$html .= '</div>';

				
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);
	}	
		
	if(isset($_POST['Nuevo_Direccion'])){
	
		$html .= '<div class="col-md-6 col-sm-9 space-left-30">
					  <h2 class="strong-header large-header">Completa tus datos</h2>
					  <form role="form" action="php/Int_Usuario.php" method="post" novalidate>
						
							<div class="form-group">
							  <label for="first-name">Ciudad</label>
							  <input type="text" class="form-control" id="ciudad" name="ciudad" required value="Guayaquil" disabled>
							</div>
							
							<div class="form-group">
							  <label for="first-name">Sector</label>
							  <input type="text" class="form-control" id="sector" name="sector" required value="">
							</div>
							
							<div class="form-group">
							  <label for="first-name">Calle Principal - Ciudadela</label>
							  <input type="text" class="form-control" id="callePrincipal" name="callePrincipal" required value="">
							</div>
							
							<div class="form-group">
							  <label for="first-name">Calle Transversal - Detalles</label>
							  <input type="text" class="form-control" id="calleTransversal" name="calleTransversal" required value="">
							</div>
						  
							<div class="form-group">
							  <label for="last-name">Numero - Villa</label>
							  <input type="text" class="form-control" id="numero" name="numero" value="" required>
							</div>			  					 						

							<div class="form-group">
							  <label for="last-name">Observacion</label>
							  <input type="text-area" class="form-control" id="observacion" name="observacion" value="" required>						
							</div>	
							
						  <button type="submit" name="agregar_direccion" class="btn btn-primary">Agregar</button>
					  </form>';		
		
				$html .= '</div>';					
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);
	}		
		
	if(isset($_POST['agregar_telefono'])){
		include_once('ClsTelefono.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsTelefono();	//instancio el objeto				
		$objeto -> agregar_telefono($_POST["localidad"], $_POST["tipo"], $_POST["codigoarea"], $_POST["numero"], $_POST["observacion"]);
		header('Location: ../cuenta-detalle.html');	
	
	}
	if(isset($_POST['actualizar_telefono'])){
		include_once('ClsTelefono.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsTelefono();	//instancio el objeto				
		$objeto -> actualizar_telefono($_POST["localidad"], $_POST["tipo"], $_POST["codigoarea"], $_POST["numero"], $_POST["observacion"], $_POST["codigo"]);
		header('Location: ../cuenta-detalle.html');	
	}
	
	if(isset($_POST['actualizar_direccion'])){
		include_once('ClsDireccion.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsDireccion();	//instancio el objeto				
		$objeto -> actualizar_direccion($_POST["codigo_d"], $_POST["sector"], $_POST["callePrincipal"], $_POST["calleTransversal"], $_POST["numero"], $_POST["observacion"]);
		header('Location: ../cuenta-detalle.html');		
	}
	if(isset($_POST['agregar_direccion'])){
		include_once('ClsDireccion.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsDireccion();	//instancio el objeto				
		$objeto -> agregar_direccion($_POST["sector"], $_POST["callePrincipal"], $_POST["calleTransversal"], $_POST["numero"], $_POST["observacion"]);
		//header('Location: ../cuenta-detalle.html');		
	}


	if(isset($_POST['Consulta_Especifica_Direccion'])){		
		include_once('ClsDireccion.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsDireccion();	//instancio el objeto				
		$id = $_POST['Consulta_Especifica_Direccion'];
		$resultado = $objeto->cargar_Direccion($id);		//ejecuto el proceso del objeto			
		foreach($resultado as $indice => $registro){		
			$html .= '<div class="col-md-6 col-sm-9 space-left-30">
					  <h2 class="strong-header large-header">Completa tus datos</h2>
					  <form role="form" action="php/Int_Usuario.php" method="post" novalidate>
						<input type="hidden" name="codigo_d" id="codigo_d" value="'.$id.'">

							<div class="form-group">
							  <label for="first-name">Ciudad</label>
							  <input type="text" class="form-control" id="ciudad" name="ciudad" required value="Guayaquil" disabled>
							</div>
							
							<div class="form-group">
							  <label for="first-name">Sector</label>
							  <input type="text" class="form-control" id="sector" name="sector" required value="'.$registro['ddir_sector'].'">
							</div>
							
							<div class="form-group">
							  <label for="first-name">Calle Principal - Ciudadela</label>
							  <input type="text" class="form-control" id="callePrincipal" name="callePrincipal" required value="'.$registro['ddir_calle_principal'].'">
							</div>
							
							<div class="form-group">
							  <label for="first-name">Calle Transversal - Detalles</label>
							  <input type="text" class="form-control" id="calleTransversal" name="calleTransversal" required value="'.$registro['ddir_calle_transversal'].'">
							</div>
						  
							<div class="form-group">
							  <label for="last-name">Numero - Villa</label>
							  <input type="text" class="form-control" id="numero" name="numero" value="'.$registro['ddir_numero'].'" required>						
							</div>			  					 						

							<div class="form-group">
							  <label for="last-name">Observacion</label>
							  <input type="text-area" class="form-control" id="observacion" name="observacion" value="'.$registro['ddir_observacion'].'" required>						
							</div>	
							
						  <button type="submit" name="actualizar_direccion" class="btn btn-primary">Actualizaer</button>
					  </form>';		
		
				$html .= '</div>';
		}		
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);		
	}
	//Consulta_Especifica_Direccion
	if(isset($_POST['actualizar_usuario'])){		
		include_once('ClsUsuario.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsUsuario();	//instancio el objeto
			
		$apellido = $_POST["last-name"];	$nombre = $_POST["first-name"];	$correo = $_POST["email"];		$clave = $_POST["password"];	
		$fecha_nacimiento = $_POST["fecha_nac"];
		$objeto -> actualizar_perfil($nombre, $apellido, $fecha_nacimiento, $correo, $clave);
		header('Location: ../cuenta-perfil.html');	
	}

	
/////////////////////////////////////////////////////////////////////////////////////////////
	
	if(isset($_POST['Consultar_DetalleEnfermedad'])){
		$html .= '<div class="col-md-6 col-sm-9 space-left-30">
					  <h2 class="strong-header large-header">Completa tus datos</h2>
					  <form role="form" action="php/Int_Usuario.php" method="post" novalidate>						
						<div class="form-group">
							<label for="localidad">Porque te registras</label>
							<select class="form-control" id="localidad" name="localidad">								  								  
								 <option value="Salud" selected>Salud </option>
								 <option value="Enfermedad" >Enfermedad </option>	
							</select>
						</div>
						<div class="form-group">
							<label for="tipo">Enfermedades</label>
							<select class="form-control" id="tipo" name="tipo">								 
								  <option value="Hipertension" selected>Hipertension</option>
								  <option value="Sobrepeso">Sobrepeso</option>
								  <option value="Diabetes">Diabetes</option>
								  <option value="Cancer">Cancer</option>
								  <option value="Osteoporosis">Osteoporosis</option>								 
							</select>
						</div>				
							
							
						  <button type="submit" name="definir_dieta" class="btn btn-primary">Agregar</button>
					  </form>			 ';		
		
				$html .= '</div>';

				
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);
	}
//	
	if(isset($_POST['Consultar_Recomendacion'])){
		$html .= '  <div class="clearfix visible-xs space-30"></div>
                  <div class="row">
                      
					  <div class="col-xs-6 col-sm-4 col-md-3">
                          <!-- SHOP FEATURED ITEM -->
                          <article class="shop-item shop-item-wishlist overlay-element">
                              <div class="overlay-wrapper">
                                  <a href="#">
                                      <img src="images/sopa.jpg" alt="Shop item">
                                  </a>
                                  <div class="overlay-contents">
                                      <div class="shop-item-actions">
                                          <button class="btn btn-primary btn-block btn-small">
                                              Add to cart
                                          </button>
                                      </div>
                                  </div>
                              </div>
                              <header class="item-info-name-features-price">
                                  <h4><a href="#">Sopa de Brocoli</a></h4>
                                  <span class="features">200ml, 50 calorias</span><br>
                                  <span class="price-old">$55.00</span>&nbsp;&nbsp;<span class="price">$42.00</span>
                              </header>
                          </article>
                          <!-- !SHOP FEATURED ITEM -->
                      </div>

					  <div class="col-xs-6 col-sm-4 col-md-3">
                          <!-- SHOP FEATURED ITEM -->
                          <article class="shop-item shop-item-wishlist overlay-element">
                              <div class="overlay-wrapper">
                                  <a href="#">
                                      <img src="images/pastel.jpg" alt="Shop item">
                                  </a>
                                  <div class="overlay-contents">
                                      <div class="shop-item-actions">
                                          <button class="btn btn-primary btn-block btn-small">
                                              Add to cart
                                          </button>
                                      </div>
                                  </div>
                              </div>
                              <header class="item-info-name-features-price">
                                  <h4><a href="#">Spot Print Overalls in Twill</a></h4>
                                  <span class="features">Black/White, S</span><br>
                                  <span class="price">$75.00</span>
                              </header>
                              <span class="out-of-stock-tag">Out of stock</span>
                          </article>
                          <!-- !SHOP FEATURED ITEM -->
                      </div>
	
              </div>			  ';			
			
				
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);
	}


	if(isset($_POST['definir_dieta'])){
		//include_once('ClsUsuario.php'); //esta es la ruta donde esta la pagina php
		//$objeto = new ClsUsuario();	//instancio el objeto
		//$objeto -> actualizar_perfil($nombre, $apellido, $fecha_nacimiento, $correo, $clave);
		header('Location: ../cuenta-dieta.html');	
		
	}
	
?> 