function objetoAjax(){
		var xmlhttp=false;
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) { 
			try {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
					xmlhttp = false;
			}
		} 
		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
			  xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
}
 

function set_usuario(){	
	ajax=objetoAjax();
	ajax.open("post", "php/Int_ValidarSesion.php", true);	
	ajax.onreadystatechange=function() {
	if (ajax.readyState==4) {	
			var data = ajax.responseText;					
			document.getElementById("usuario").innerHTML = data;
		}
	}
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send();
} 
function logout() {
 			$.ajax({
				dataType: "json",				
				url:   'php/Int_CerrarSesion.php',
				type:  'post',
				beforeSend: function(){},
				success: function(){			
					window.location.href ="index.html";
				},
				error:	function(){ 
					window.location.href ="index.html";
				}
			});
}

function set_acceso(){	
	ajax=objetoAjax();
	ajax.open("post", "php/isu_restingir.php", true);	
	ajax.onreadystatechange=function() {
	if (ajax.readyState==4) {	
			var data = ajax.responseText;					
				window.location.href = "byb_login.html"; 
		}
	}
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send();
}

jQuery(document).ready(function($){	
          set_usuario();
}); 