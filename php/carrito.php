
<?php

session_start();
include_once('InstConexion.php');

if (isset($_Session['nombre'])){

	echo '<h1> Bienvenid@ </h1>';
}


else {

	echo ' <script type= "text/javascript >
	alter ("Debe iniciar sesion para ingresar hacer su compra");
	window.location.href="../login.html"
	</script>'
}

if (isset(($_Post['pla_codigo']))){
	$id = $_POST('pla_codigo');
 	$nombre = $_POST('pla_nombre');
 	$descripcion = $_POST('pla_descripcion');
 	$precio = $_POST('pla_pecio');
 	$estado = $_POST('pla_estado');
 	$cantidad= $_POST('cantidad');


 	$shopPlato[]= array('id'=>pla_codigo ,'nombre'->$pla_nombre, 'descripcion'->$pla_descripcion, 'precio'->$pla_pecio, 'cantidad'->$cantidad );

 		if (isset($_Session['carrito'])){
 			$shopPlato= $_Session['carrito'];
 			if (isset(($_Post['pla_codigo']))){
			$id = $_POST('pla_codigo');
 			$nombre = $_POST('pla_nombre');
 			$descripcion = $_POST('pla_descripcion');
 			$precio = $_POST('pla_pecio');
 			$estado = $_POST('pla_estado');
 			$cantidad= $_POST('cantidad');
 				$posicion= -1;
 			for ($i=0;$i<cont ($shopPlato);$i++){
 				if($id== $shopPlato[$i] ['pla_codigo']){
 					$posicion= $i;
 				}

 			}

 			if ($posicion!= -1){
 				$cantidad_nuev= $shopPlato[$posicion]['cantidad']+cantidad;
 				$shopPlato[$posicion]= array('id'=>pla_codigo ,'nombre'->$pla_nombre, 'descripcion'->$pla_descripcion, 'precio'->$pla_pecio, 'cantidad'->$cantidad );
 			}
 		}

 		//Procesos

 		if(isset($_POST['update'])){
 			$update = $_POST['update'];
 			$cantidad = $_POST['cantidad'];
 			$shopPlato[$update]['cantidad'= $cantidad];


 		}

 		//Eliminar plato

 		if(isset($_POST['eliminar'])){
 			$eliminar = $_Session['eliminar'];
 			$shopPlato['eliminar']= null;

 		}

 		if (isset($shopPlato)){

 			$_Session['carrito']= $shopPlato;

 		}

 		// calcula

 		if (isset($shopPlato)){

 			$total= 0;

 			for ($i=0; $i <count ($shopPlato) ; $i++) { 
 				if ($shopPlato[$i] != null){
 					echo $shopPlato [$i] ['pla_nombre'];
 					echo $shopPlato [$i] ['pla_pecio'];

 					<form action="#" method = "_Post" onsubmit= return validarForm(this)>
 						<input type = "hidden"  name= "update" value =$i;
 						<input type = "hidden"  name= "cantidad"  min="1"  max= echo $shopPlato[$i]['stock']; value =$shopPlato[$i]['cantidad'];
 						<input type = "hidden"  name= "update" value =$i;
 					
 					</form>	
 					$subtotal = $shopPlato[$i]['pla_precio']* $shopPlato[$i]['cantidad'];
 						$total= $subtotal + $total;
 						echo '$';  echo $subtotal;
 						

 				}
 				# code...
 			}
 		}
}

}
?>