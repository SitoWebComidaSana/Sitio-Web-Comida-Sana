<html>
<head>
</head>
<body>
<div id="main">
<?php
<?php
$valor1=$_POST ("nombre");
$valor2=$_POST ("descripcion");
$valor3=$_POST ("imagen");

echo 'Hola ' . htmlspecialchars($valor1) . ($valo2)  . '!';
echo 'ruta archivo ' . htmlspecialchars($valor3) . '!';
include_once ("PlatoCollector1.php");
 
PlatosCollectorObj= new PlatoCollector1();
PlatosCollectorObj->createPlato($valor1, $valor2, $valor3);

echo "valor agregado";


?>

<div><a href="index.php">Volver al Inicio</a></div>
</div>
</body>
</html>

