<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>formulario Plato</title>
</head>
<body>
<form action="insert.php" method="post" >
<p>
Nombre: <input type="text" name="nombre" autofocus required />
</p>

<p>
Descripcion: <input type="text" name="descripcion" autofocus required />
</p>
<p>

Seleccione el archivo:
<input type="file" name="foto"><br>
<input type="submit" value="Enviar">

</form>
</body>
</html>
