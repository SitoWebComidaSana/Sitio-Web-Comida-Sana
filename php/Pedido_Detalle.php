

<?php
session_start();
include_once('InstConexion.php');


$compra = $this->session->userdata("compra");
$usuario = $this->session->userdata("usuario");

public function delete_item((idplato)
{
  $compra = $this->session->userdata("compra");
  $this->session->unset_userdata('compra');
  $this->session->set_userdata("compra",$compra);
  
  redirect("index/show_compra");
}


?>


<article class="articulodetalle">   </article>
<?php

$archivo="../contador.txt";
$abre= fopen($archivo, "r");
$total= fread($abre,filesize($archivo));


fclose($abre);
$abre= fopen($archivo, "w");
total= $total+1;
$grabar= fwrite($abre, $total);

fclose($abre);


?>

<?

 $id = $_POST('pla_codigo');
 $portada= $_POST("portada")
 $nombre = $_POST('pla_nombre');
 $descripcion = $_POST('pla_descripcion');
 $precio = $_POST('pla_pecio');
 $estado = $_POST('pla_estado');

 echo '<h2> Detalles del Plato </h2>' ;
 echo '<h2> Imagen: </h2>' <img src="../public_html/images/home-slider-3.jpg";

<h2> Nombre:  echo $nombre </h2>;
<h2> Descripcion:  echo $descripcion </h2>;
<h2> Precio:  echo $precio </h2>;
<h2> Estado:  echo $estado </h2>;

 <form action="compra.php" method= "post">
 	<input type= "hidden" name= "id"  value = echo $row [0];/>
 	<input type= "hidden" name= "portada"  value = echo $row [1];/>
 	<input type= "hidden" name= "descripcion"  value = echo $row [2];/>
 	<input type= "hidden" name= "precio"  value = echo $row [3];/>
 	<input type= "hidden" name= "estado"  value = echo $row [4];/>
 	<input type= "hidden" name= "cantidad"  value = "1";/>

 <button type="submit" class="btn btn-primary">Agregar Compra</button>
 	</form>
 	<a href="../menu.html" <button type="submit" class="btn btn-primary">Seguir</button
 	<div class ="fondoBoton" width= "400">
 	<br><br>
 	<h2> Nombre: echo $nombre </h2>
 	<h2> Descripcion: echo $descripcion </h2>
 	<h2> Precio: echo $precio </h2>
 	<h2> Estado: echo $estado </h2>



 	</div>

?>