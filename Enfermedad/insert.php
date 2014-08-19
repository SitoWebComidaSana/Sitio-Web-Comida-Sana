<html>
<head>
</head>

<body>
<div id="main">
<?php
$valor=$_POST["enf_descripcion"];
//$valor="manuel";
echo 'Enfermedad : ' . htmlspecialchars($valor) . '!';

include_once("DemoCollector.php");

$DemoCollectorObj = new DemoCollector();
$DemoCollectorObj->createDemo($valor);

echo "valor agregado </br>";
?>
<div><a href="index.php">Volver al Inicio</a></div>
</div>
</body>
</html>
