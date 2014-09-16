// JavaScript Document


$(document).ready(function() {
 		cargar_contenido();	
			
});			
function cargar_contenido(){			
		
			$.ajax({
				dataType: "json",
				data: {"Consulta_Compra": "" },
				url:   'php/Int_Compra.php',
				type:  'post',
				beforeSend: function(){/*Lo que se hace antes de enviar el formulario*/},
				success: function(respuesta){/*lo que devuelve*/				
					$("#ordenCompra").html(respuesta.html);
				},
				error:	function(xhr,err){ }
		});
}


