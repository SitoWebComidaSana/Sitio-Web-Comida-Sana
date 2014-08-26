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
</div>
</body>
</html>
