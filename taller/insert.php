<html>
<head>
</head>

<body>
<div id="main">
<?php
$valor=$_POST["nombre"];
$valor2=$_POST["apellido"];
$valor3=$_POST["imagen"];
echo $valor3;

include_once("DemoCollector.php");

$DemoCollectorObj = new DemoCollector();
$DemoCollectorObj->createDemo($valor, $valor2, $valor3);


?>

</div>
</body>
</html>
