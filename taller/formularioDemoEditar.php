<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>formulario Demo</title>
</head>
<body>

<?php
//obtener el valor de ID que viene del metodo GET a traves de HTTP
$id=$_GET["id"];
include_once("DemoCollector.php");
include_once("Demo.php");
$DemoCollectorObj = new DemoCollector();
$ObjDemo = $DemoCollectorObj->showDemo($id);
?>
<h2>Editar Objeto Demo </h2>
<form action="editar.php" method="post" >
<p>
Id: <input type="text" name="enf_codigo" value="<?php echo $ObjDemo->getenf_codigo(); ?>" readonly />
</p>

<p>
Descripcion: <input type="text" name="nombre"  value="<?php echo $ObjDemo->getenf_descripcion(); ?>" autofocus required />
</p>

<p>
Estado: <input type="text" name="enf_estado" value="<?php echo $ObjDemo->getenf_estado(); ?>" readonly />
</p>
<a href="index.php">Cancelar</a>
<input type="submit" value="Guardar" />

</form>
