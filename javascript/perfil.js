// JavaScript Document



function informacion_cuenta(){	
		$.ajax({
				dataType: "json",
				data: {"Consulta": "" },
				url:   'php/Int_Usuario.php',
				type:  'post',
				beforeSend: function(){/*Lo que se hace antes de enviar el formulario*/},
				success: function(respuesta){/*lo que devuelve*/				
					$("#datos").html(respuesta.html);
				},
				error:	function(xhr,err){ }
		});
} 


//Documento listo
$( document ).ready(function() {

	  informacion_cuenta();
	  
});
