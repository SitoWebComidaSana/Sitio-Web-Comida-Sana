<html>
<head>
</head>
<?php
include_once("PlatoCollector.php");
$DemoCollectorObj = new PlatoCollector();
?>
<body>
<div id="main">
<table>
<tr><td><a href="formularioPlatoInsert.php">Nuevo</a></td></tr>
<?php
foreach ($PlatoCollectorObj->readPlato() as $c){
  echo "<tr>";
  echo "<td>".$c->getIdplato() ."</td>";
  echo "<td>".$c->getNombre()."</td>";
  echo "<td>".$c->getDescripcion()."</td>";
  
  echo "<td><a href='formularioPlatoEditar.php?id=".$c->getIdPlato()."'>editar</a></td>";
  echo "<td><a href='eliminar.php?id=".$c->getIdPlato()."'>eliminar</a></td>"; 
  echo "</tr>"; 
}
?>
</table>
</div>
</body>
</html>
