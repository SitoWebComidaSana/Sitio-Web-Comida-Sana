<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>formulario Enfermedad</title>
</head>
<body>
<form action="insert.php" method="post"  enctype="multipart/form-data">
<p>
Descripcion: <input type="text" name="enf_descripcion" autofocus required />
Archivo: <input name="fichero" type="file"> 
    <input name="subir" type="submit" value="Insertar!">  
</p>


</form>
