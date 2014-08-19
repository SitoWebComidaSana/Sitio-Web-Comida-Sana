<html>
<head>
</head>

<body>
<div id="main">
<?php
$valor=$_POST["nombre"];
//$valor="manu";
echo 'Hola ' . htmlspecialchars($valor) . '!';

include_once("PlatoCollector.php");

$PlatoCollectorObj = new PlatoCollector();
$PlatoCollectorObj->createPlato($valor);

echo "valor agregado </br>";
?>
<div><a href="index.php">Volver al Inicio</a></div>
</div>
</body>
</html>
