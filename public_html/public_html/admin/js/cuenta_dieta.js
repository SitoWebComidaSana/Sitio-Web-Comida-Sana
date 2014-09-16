// JavaScript Document

function informacion_cuenta(){	
/*		$.ajax({
				dataType: "json",
				data: {"Consultar_DetalleEnfermedad": "" },
				url:   'php/Int_Usuario.php',
				type:  'post',
				beforeSend: function(){//Lo que se hace antes de enviar el formulario},
				success: function(respuesta){//lo que devuelve				
					$("#datos").html(respuesta.html);
				},
				error:	function(xhr,err){ }
		});
*/
		$.ajax({
				dataType: "json",
				data: {"Consultar_Recomendacion": "" },
				url:   'php/Int_Usuario.php',
				type:  'post',
				beforeSend: function(){//Lo que se hace antes de enviar el formulario
				},
				success: function(respuesta){//*lo que devuelve
					$("#datos_recomendacion").html(respuesta.html);
				},
				error:	function(xhr,err){ }
		});
} 

function editar(codigo){	
		/*$.ajax({
				dataType: "json",
				data: {"Consulta_Especifica_Telefono": codigo },
				url:   'php/Int_Usuario.php',
				type:  'post',
				beforeSend: function(){//Lo que se hace antes de enviar el formulario},
				success: function(respuesta){//lo que devuelve				
					$("#dato_especifico").html(respuesta.html);
				},
				error:	function(xhr,err){ }
		});*/
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

function add(codigo){
//var parameter =document.URL;
		$.ajax({
				dataType: "json",
				data: {"Agregar_Producto": codigo},
				url:   'php/Int_Compra.php',
				type:  'post',
				beforeSend: function(){/*Lo que se hace antes de enviar el formulario*/},
				success: function(respuesta){/*lo que devuelve*/				
					//$("#dato_especifico_direccion").html(respuesta.html);				
					if(respuesta=="false") { window.location.href ="login.html";} //va a iniciar sesion 
					if(respuesta =="true")  { window.location.href ="compra.html"; } //va al carrito de compra
				},
				error:	function(xhr,err){ }
		});		
}

//Documento listo
$( document ).ready(function() {
	  informacion_cuenta();  
});
