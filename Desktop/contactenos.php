<html><head><title>formulario de envio</title></head>
<body>
<? if (!$HTTP_POST_VARS){ ?>
<FORM action="cantactenos.php" method=post> Tu Nombre:
<input type="text" name="name" size="30" style="text-align: justify"> <br><br>
Tu e-mail:
<input type="text" name="e-mail" size="30" style="text-align: justify" value="@" >
<br><br>
Mensaje:
<textarea name="txtmessage" rows="9" cols="64" style="text-align: justify" ></textarea>
<br><br />
<center>
<INPUT TYPE="RESET" NAME="limpiar" VALUE="Limpiar">&nbsp;
<INPUT TYPE="SUBMIT" NAME="enviar" VALUE="Enviar">
</center>

</FORM>

<br><br>

<?
}
else{
//Nota. Cuerpo o contenido del mensaje.
$cuerpo = "<br>Meddelande fr&#229;n <br><br> n";
$cuerpo .= "Nombre: " . $HTTP_POST_VARS["name"] . " <br> n";
$cuerpo .= "Correo: " . $HTTP_POST_VARS["e-mail"] . "<br> n";
$cuerpo .= "Mensaje: " . $HTTP_POST_VARS["txtmessage"] . "<br><br> n";

//Nota. Cabeceras para el env√≠o en formato HTML.
$headers = "MIME-Version: 1.0rn";
$headers .= "Content-type: text/html; charset=iso-8859-1rn";

//Nota. Direcci√≥n del remitente.
$headers .= "From: " . $HTTP_POST_VARS["e-mail"] . "n";

//Nota. Direcci√≥n de respuesta.
$headers .= "Reply-To: " . $HTTP_POST_VARS["e-mail"] . "n";

//Nota. Ruta del mensaje desde origen a destino.
$headers .= "Return-path: " . $HTTP_POST_VARS["e-mail"] . "n";

//Nota. Funcion Mail de PHP:
// mail( $correoreceptor, $asunto, $mensaje, $cabeceras );


mail("ACAVATUMAIL@loquesea.com","Contacto de:",$cuerpo,$headers);


//Confirmaci√≥n de envio del mensaje.
echo "El comentario se ha enviado con exito, te contactaremos en la brevedad!";

}

?>
</body>
</html> 
