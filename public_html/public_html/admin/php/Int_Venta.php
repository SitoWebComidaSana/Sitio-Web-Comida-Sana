<?php
	session_start();
	require("Carrito.php");
	
	date_default_timezone_set('utc');		
	if(isset($_SESSION["_usuario"])){
		//echo "su usuario es:  ".$_SESSION['_usuario'];            
	}else{
		$usuario =  date("Ymd").'/'.rand();
		$_SESSION["_usuario"] = $usuario;
	}
	
	///// slider//////////
	if(isset($_POST['Consulta_Venta'])){		
		include_once('Cls_CarritoBase.php'); //esta es la ruta donde esta la pagina php
		$objeto = new Cls_CarritoBase();	

		if( !$_SESSION["carrito"] ){
				$html .='<h1 class="strong-header">El carro de compras<br>esta vacio</h1>
					<p> No tienes items agregados en tu carro de compras.</p>
					<a href="index.html" class="btn btn-primary">Continuar comprando</a>';							
		}
		else{
						
			$html .='<h1 class="strong-header">Gracias por su compra, su orden es: </h1>';
			$resultado = $objeto->getProductos($_SESSION["usuario"]);		//ejecuto el proceso del objeto					
			foreach($resultado as $indice => $registro){		


				$html .= '<article class="shop-summary-item">
	                <img src="images/content/cart-purchased-small-1.jpg"  alt="Shop item in cart">
	                <div class="item-info-name-features-price">
	                 <h4>Plato:'.$registro['pla_nombre'].'</h4>
	                 
	                 <span class="quantity">'.$registro['dped_cantidad'].'</span><b>&times;</b>
					 <span class="price">$'.$registro['pla_precio'].'.00</span>
	                </div>              
	              </article>';
				$sub= 	($registro['pla_precio'])*$registro['dped_cantidad'];  
				$total =$total +$sub;
			}	


			$html .='<hr>
<div class="col-sm-6 col-md-4 col-md-offset-4"><div class="table"><table class="price-calc"><tbody>						
				<tr class="order-total"><th>total de la orden</th><td class="text-right">
                                   <div id="total">$'.$total.'.00</div>
               </td></tr></tbody></table></div></div><div class="col-xs-12"><button type="button" onClick="window.location.href=';
	$html  .="'index.html'";
	$html  .='" class="btn btn-default pull-left">Continuar comprando</button>';


			



			$html .= '<div class="cleaner">&nbsp;</div>';	


		}			
		$respuesta = array("html"=>$html);
		echo json_encode($respuesta);		
	}	
	



	
			

?> 