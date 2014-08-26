<html>
<head>
</head>

<body>
<div id="main">
<?php
<<<<<<< HEAD
$valor=$_POST["enf_descripcion"];
//$valor="manuel";
echo 'Enfermedad : ' . htmlspecialchars($valor) . '!';

include_once("DemoCollector.php");

$ruta="Enfermedad/images/";//ruta carpeta donde queremos copiar las imágenes
$uploadfile_temporal=$_FILES['fichero']['tmp_name'];
$uploadfile_nombre=$ruta.$_FILES['fichero']['name'];

if (is_uploaded_file($uploadfile_temporal))
{
    move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
}
else
{
echo "error";
}
$directorio=opendir("images/");
while($ficheros=readdir($directorio))
{
    $url="images/".$ficheros;
    echo "<img src=".$url.">";
}

$DemoCollectorObj = new DemoCollector();
$DemoCollectorObj->createDemo($valor);
echo "valor agregado </br>";

?>
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

</body>
<
?>
<div><a href="index.php">Volver al Inicio</a></div>
=======
$valor=$_POST["nombre"];
$valor2=$_POST["apellido"];
$valor3=$_POST["imagen"];
echo $valor3;

include_once("DemoCollector.php");

$DemoCollectorObj = new DemoCollector();
$DemoCollectorObj->createDemo($valor, $valor2, $valor3);


?>

>>>>>>> a3fecae8413a96fd1df6e43b6b218b76e7250b8c
</div>
</body>
</html>
