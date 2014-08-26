<html>
<head>
</head>

<body>
<div id="main">
<?php
$enf_codigo=$_POST["enf_codigo"];
$descripcion=$_POST["enf_descripcion"];
$enf_estado=$_POST["enf_estado"];

echo "Edici&oacute;n en proceso ....  </br>";

include_once("DemoCollector.php");
$DemoCollectorObj = new DemoCollector();
$DemoCollectorObj->updateDemo($enf_codigo,$enf_descripcion, $enf_estado);

echo "id :".$enf_codigo." actualizado a:".$enf_descripcion."estado :".$enf_estado." </br>";
?>
<div><a href="index.php">Volver al Inicio</a></div>
</div>
</body>
</html>
