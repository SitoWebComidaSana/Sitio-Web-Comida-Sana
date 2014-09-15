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
	if(isset($_POST['Consulta_Compra_Slider'])){		
		include_once('Cls_CarritoBase.php'); //esta es la ruta donde esta la pagina php
		$objeto = new Cls_CarritoBase();	

		if( !$_SESSION["carrito"] ){
				$html .='<h1 class="strong-header">El carro de compras<br>esta vacio</h1>
					<p> No tienes items agregados en tu carro de compras.</p>
					<a href="index.html" class="btn btn-primary">Continuar comprando</a>';							
		}
		else{
						
			
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


			$html .='<hr><span class="total-price-tag pull-left">Subtotal</span>
			  <span class="total-price pull-right">$'.$total.'.00</span>';
			
			$html .='<a href="index.html" class="btn btn-primary">Continuar comprando</a> ';
			$html .= '<div class="cleaner">&nbsp;</div>';	


		}			
		$respuesta = array("html"=>$html);
		echo json_encode($respuesta);		
	}	
	



	/////////////////////////////tabla
	if(isset($_POST['Consulta_Compra'])){		
		include_once('Cls_CarritoBase.php'); //esta es la ruta donde esta la pagina php
		$objeto = new Cls_CarritoBase();	

		if( !$_SESSION["carrito"] ){
				$html .='<h1 class="strong-header">El carro de compras<br>esta vacio</h1>
					<p> No tienes items agregados en tu carro de compras.</p>
					<a href="index.html" class="btn btn-primary">Continuar comprando</a>';			
				$html .= '<div class="cleaner">&nbsp;</div>';		
		}
		else{
			$i=0;			$x=10;
	 $html .= '<section class="row"><form action="venta.html" method="post" novalidate><div class="col-xs-12"><div class="table table-responsive cart-summary">
	 <div class="cleaner">&nbsp;</div>'; 
	 $html .= '<table><thead><tr>';
	 $html .= '<td colspan="2" class="width16">Producto</td>';
	 $html .= '<td class="width16">Cantidad</td><td class="text-right width16">Subtotal</td>';
	 $html .= '</tr></thead><tbody>';

			$resultado = $objeto->getProductos($_SESSION["usuario"]);		//ejecuto el proceso del objeto					
			foreach($resultado as $indice => $registro){		
$i=$i+1;
				$html .= '<tr>';
				$html .= '<td>';
	 			$html .= '<a href="#">';
	 			$html .= '<img src="images/content/cart-purchased-1.jpg" alt="Shop item">';
	 			$html .= '</a>
	 			<br>';

     $html .= '</td><td>'; 
	 $html .= ' <h4>Plato:'.$registro['pla_nombre'].'</h4>';
	 $html .= '$<span class="price" id="p_quantity'.$i.'">'.$registro['pla_precio'].'.00 </span>';  
	 $html .= '<br><br>';
	 $html .= '<a href="javascript:e_c('."'".$registro['dped_linea']."'".');">Eliminar</a>';



	 $html .= '</td><td><input name="'.$registro['dped_linea'].'" onkeyup="javascript:calcular(';
	 $html .="'";
	 $html .= 'quantity'.$i;	 
	 $html .="', ".$x;
	 $html .= ');"   id="quantity'.$i.'" value="'.$registro['dped_cantidad'].'" class="form-control spinner-quantity"  required>';
	 $html .= '</td><td class="text-right">$<span id="c_quantity'.$i.'">'.
	 $registro['dped_cantidad']*$registro['pla_precio'].'.00</span></td></tr>'; 
	



				$sub= 	($registro['pla_precio'])*$registro['dped_cantidad'];  
				$total =$total +$sub;
			}	

	$html .= '</tbody></table>';
	$html .= '</div></div><div class="col-sm-6 col-md-4 form-inline"></div>	
              <div class="col-sm-6 col-md-4 col-md-offset-4"><div class="table"><table class="price-calc"><tbody>						
				<tr class="order-total"><th>total de la orden</th><td class="text-right">
                                   <div id="total">$'.$total.'.00</div>
               </td></tr></tbody></table></div></div><div class="col-xs-12"><button type="button" onClick="window.location.href=';
	$html  .="'index.html'";
	$html  .='" class="btn btn-default pull-left">Continuar comprando</button>
                        <button type="submit" class="btn btn-primary pull-right" >Proceder a la compra</button></div>
                </form> </section>';


			$html .= '<div class="cleaner">&nbsp;</div>';	


		}			
		$respuesta = array("html"=>$html);
		echo json_encode($respuesta);		
	}	
	
	if(isset($_POST['Agregar_Producto'])){			
		try {					

				$codigo =  $_POST['Agregar_Producto'];
				include_once('InstConexion.php');	$objeto = new  InstConexion();	$objeto->Conectar();
	
				//////////////   va a ver el plato   /////////////////////////	
				$result = mysql_query("SELECT * FROM `plato` where `pla_codigo`=" . $codigo);
				$row = mysql_fetch_array($result);
				/////////////////////////////////////////////////////////////

				$carrito = new Carrito();
				$_SESSION["carrito"] = $carrito;
				//Creo dos productos para jugar con ellos
				$prod = new Producto();
				$prod->codigo = $codigo;
				$prod->cantidad = 1;
				$prod->nombre = $row['pla_descripcion'];
				$prod->precio = $row['pla_precio'];
				$_SESSION["carrito"]->agregarProducto($prod);


		 		$result = mysql_query("INSERT INTO `detalle_pedido` (`cped_codigo` ,`cod_plato` ,`dped_cantidad` ,`usuario` ,`estado`) 
 					VALUES ( '1', '".$codigo."', '1', '".$_SESSION["usuario"]."',  'solicitado')"); 

	
			
				$respuesta .= 'true';	
				//$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"

		} catch (Exception $e) {		
			$respuesta .= 'false';	
			//$respuesta = array("html"=>$html);//value="'.$registro['usu_fecha_nacimiento'].'"		
		}
		echo json_encode($respuesta);
	}
			

?> 