// JavaScript Document

function informacion_cuenta(){	
		$.ajax({
				dataType: "json",
				data: {"Consultar_DetalleEnvio": "" },
				url:   'php/Int_Usuario.php',
				type:  'post',
				beforeSend: function(){/*Lo que se hace antes de enviar el formulario*/},
				success: function(respuesta){/*lo que devuelve*/				
					$("#datos").html(respuesta.html);
				},
				error:	function(xhr,err){ }
		});

		$.ajax({
				dataType: "json",
				data: {"Consultar_DetalleDireccion": "" },
				url:   'php/Int_Usuario.php',
				type:  'post',
				beforeSend: function(){/*Lo que se hace antes de enviar el formulario*/},
				success: function(respuesta){/*lo que devuelve*/				
					$("#datos_direccion").html(respuesta.html);
				},
				error:	function(xhr,err){ }
		});
} 

function editar(codigo){	
		$.ajax({
				dataType: "json",
				data: {"Consulta_Especifica_Telefono": codigo },
				url:   'php/Int_Usuario.php',
				type:  'post',
				beforeSend: function(){/*Lo que se hace antes de enviar el formulario*/},
				success: function(respuesta){/*lo que devuelve*/				
					$("#dato_especifico").html(respuesta.html);
				},
				error:	function(xhr,err){ }
		});
} 
function editar_d(codigo){	
		$.ajax({
				dataType: "json",
				data: {"Consulta_Especifica_Direccion": codigo },
				url:   'php/Int_Usuario.php',
				type:  'post',
				beforeSend: function(){/*Lo que se hace antes de enviar el formulario*/},
				success: function(respuesta){/*lo que devuelve*/				
					$("#dato_especifico_direccion").html(respuesta.html);
				},
				error:	function(xhr,err){ }
		});
}
function nuevo(){	
		$.ajax({
				dataType: "json",
				data: {"Nuevo_Telefono": "" },
				url:   'php/Int_Usuario.php',
				type:  'post',
				beforeSend: function(){/*Lo que se hace antes de enviar el formulario*/},
				success: function(respuesta){/*lo que devuelve*/				
					$("#dato_especifico").html(respuesta.html);
				},
				error:	function(xhr,err){ }
		});
}
function nuevo_d(){	
		$.ajax({
				dataType: "json",
				data: {"Nuevo_Direccion": "" },
				url:   'php/Int_Usuario.php',
				type:  'post',
				beforeSend: function(){/*Lo que se hace antes de enviar el formulario*/},
				success: function(respuesta){/*lo que devuelve*/				
					$("#dato_especifico_direccion").html(respuesta.html);
				},
				error:	function(xhr,err){ }
		});
}
//Documento listo
$( document ).ready(function() {
	  informacion_cuenta();  
});
