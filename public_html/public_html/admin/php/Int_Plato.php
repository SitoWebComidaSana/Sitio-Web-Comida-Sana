<?php
	session_start();
	date_default_timezone_set('utc');		
	if(isset($_SESSION["_usuario"])){
		//echo "su usuario es:  ".$_SESSION['_usuario'];            
	}else{
		$usuario =  date("Ymd").'/'.rand();
		$_SESSION["_usuario"] = $usuario;
	}
	
	
	if(isset($_POST['Cargar'])){
		include_once('ClsPlato.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsPlato();	//instancio el objeto
				
		$resultado = $objeto->cargar_Plato();		//ejecuto el proceso del objeto			

		$html .= '<div class="col-md-6 col-sm-9 space-left-30">
					  <h2 class="strong-header large-header">Lista de Platos</h2>
		 <button type="button" name="nuevo" onclick="nuevo_d()" class="btn btn-success btn-primary btn-mini">Agregar Nuevo</button>  ';
		$html .= '<div class="table">
						  <table>
							<thead>
							<tr>
							  <td></td>
							  <td>Bombre del plato</td>
							  <td>Descripcion </td>
							  <td>Precio</td>
							  <td>Imagen </td>
							  
							  <td>
							  </td>						  
							</tr>
							</thead>
							<tbody>';
							$i=0;
		foreach($resultado as $indice => $registro){
			$i=$i+1;
				$html .= '	<tr>							  
							  <td><a href="javascript:editar_d('.$registro['pla_codigo'].');">'.$i.'</a></td>
							  <td>'.$registro['pla_nombre'].'</td>							  
							  <td>'.$registro['pla_descripcion'].'</td>
							  <td>'.$registro['pla_precio'].'</td>
							  <td>

							  <img src="upload/'. $registro['pla_imagen'].'" alt="Highlighted shop item">

							  </td>
							  

							</tr>';				  
		}      
		$html .= '</tbody> </table> </div> </div>';
		
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);
	}
	
			
	if(isset($_POST['Nuevo_Plato'])){
	
		$html .= '<div class="col-md-6 col-sm-9 space-left-30">
					  <h2 class="strong-header large-header">Completa tus datos</h2>
					  <form role="form" action="php/Int_Usuario.php" method="post" novalidate>
						
							<div class="form-group">
							  <label for="first-name">Codigo</label>
							  <input type="text" class="form-control" id="ciudad" name="ciudad" required value="Guayaquil" disabled>
							</div>
							
							<div class="form-group">
							  <label for="first-name">Plato</label>
							  <input type="text" class="form-control" id="sector" name="sector" required value="">
							</div>
							
							<div class="form-group">
							  <label for="first-name">Descripcion</label>
							  <input type="text" class="form-control" id="callePrincipal" name="callePrincipal" required value="">
							</div>
							
							<div class="form-group">
							  <label for="first-name">Precio</label>
							  <input type="text" class="form-control" id="calleTransversal" name="calleTransversal" required value="">
							</div>
						  
							<div class="form-group">
							  <label for="last-name">Imagen</label>
							  <input type="text" class="form-control" id="numero" name="numero" value="" required>
							</div>			  					 						

							
							
						  <button type="submit" name="agregar_plato" class="btn btn-primary">Agregar</button>
					  </form>';		
		
		$html .= '</div>';					
		
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);
	}		
		
	if(isset($_POST['actualizar_plato'])){
		include_once('ClsPlato.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsPlato();	//instancio el objeto				
		
		$objeto -> actualizar_plato($_POST["pla_codigo"], $_POST["pla_nombre"], $_POST["pla_descripcion"], $_POST["pla_precio"]);
		//header('Location: ../cuenta-detalle.html');		
	header('Location: ../admin.html');

		}       

	if(isset($_POST['agregar_plato'])){
		include_once('ClsPlato.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsPlato();	//instancio el objeto				
		
		$objeto -> agregar_plato($_POST["pla_codigo"], $_POST["pla_nombre"], $_POST["pla_descripcion"], $_POST["pla_precio"]);
		header('Location: ../admin.html');		
	}

	if(isset($_POST['Consulta_Especifica_Plato'])){		
		include_once('ClsPlato.php'); //esta es la ruta donde esta la pagina php
		$objeto = new ClsPlato();	//instancio el objeto				
		
		$id = $_POST['Consulta_Especifica_Plato'];
		$resultado = $objeto->cargar_Palto_Esp($id);		//ejecuto el proceso del objeto			
		

		foreach($resultado as $indice => $registro){		
			$html .= '<div class="col-md-6 col-sm-9 space-left-30">
					  <h2 class="strong-header large-header">Completa tus datos</h2>
					  <form role="form" action="php/Int_Usuario.php" method="post" novalidate>
						
							<div class="form-group">
							  <label for="first-name">Codigo</label>
							  <input type="text" class="form-control" id="ciudad" name="ciudad" required value="'.$registro['pla_codigo'].'" disabled>
							</div>
							
							<div class="form-group">
							  <label for="first-name">Plato</label>
							  <input type="text" class="form-control" id="sector" name="sector" required value="'.$registro['pla_nombre'].'">
							</div>
							
							<div class="form-group">
							  <label for="first-name">Descripcion</label>
							  <input type="text" class="form-control" id="callePrincipal" name="callePrincipal" required value="'.$registro['pla_descripcion'].'">
							</div>
							
							<div class="form-group">
							  <label for="first-name">Precio</label>
							  <input type="text" class="form-control" id="calleTransversal" name="calleTransversal" required value="'.$registro['pla_precio'].'">
							</div>
						  
							<div class="form-group">
							  <label for="last-name">Imagen</label>
							  <input type="text" class="form-control" id="numero" name="numero" value="" required>
							</div>			  					 						
					<input type="hidden" name="codigo_d" id="codigo_d" value="'.$id.'">				
					  <button type="submit" name="actualizar_plato" class="btn btn-primary">Agregar</button>
					  </form>';


			
							
		
				$html .= '</div>';
		}		
		$html .= '<div class="cleaner">&nbsp;</div>';	
		$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"
		echo json_encode($respuesta);		
	}
	


?> 