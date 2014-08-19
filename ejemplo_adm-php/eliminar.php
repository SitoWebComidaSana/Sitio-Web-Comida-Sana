<html>
<head>
</head>

<body>
<div id="main">
<?php
//obtener el valor de ID que viene del metodo GET a traves de HTTP
$id=$_GET["idplato"];


include_once("PlatoCollector.php");
//creo una instancia de DemoCollector
$PlatoCollectorObj = new PlatoCollector();
//Ejecuto el metodo para eliminar el objeto  indicando el id
$PlatoCollectorObj->deletePlato($id);

// muestro mensaje de que se ha eliminado el objeto 
echo "valor id". htmlspecialchars($id) ."  ha sido eliminado correctamente.";
?>
<div><a href="index.php">Volver al Inicio</a></div>
</div>
</body>
</html>
