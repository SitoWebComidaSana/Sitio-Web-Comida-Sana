<html>
<head>
</head>
<?php
include_once("DemoCollector.php");
$DemoCollectorObj = new DemoCollector();
?>
<body>
<div id="main">
<table>
<tr><td><a href="formularioDemoInsert.php">Nueva enfermedad</a></td></tr>
<?php
foreach ($DemoCollectorObj->readDemos() as $c){
  echo "<tr>";
  echo "<td>".$c->getenf_codigo() ."</td>";
  echo "<td>".$c->getenf_descripcion()."</td>";
  echo "<td>".$c->getenf_estado()."</td>";
  echo "<td><a href='formularioDemoEditar.php?id=".$c->getenf_codigo()."'>editar</a></td>";
  echo "<td><a href='eliminar.php?id=".$c->getenf_codigo()."'>eliminar</a></td>"; 
  echo "</tr>"; 
}
?>
</table>
</div>
</body>
</html>
