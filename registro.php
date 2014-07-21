<?php
    include("includes/top_page.php");
?>
<!--------------Header--------------->
<header>
<?php include("../NewProject/includes/logo.php"); ?>
</header>
<nav>
	<div class="wrap-nav zerogrid">
		<?php include("../NewProject/includes/menu.php"); ?>		
		<?php include("../NewProject/includes/social.php"); ?>
</nav>

<body>
Formulario de Registro
<div  id = "div1" >
<h1> CREACION DE CUENTA </ h1>
  <div  id = "div2" >
    
	<form action= "login.php" method = "post">
	<fieldset>
     <legend> Registrate Y SE PARTE DE NUESTROS CLIENTES EXCLUSIVOS </legend>
  	 <div class="Datos">	
     <label> Nombre </label>
     <input type="text" name="username" id="username"/>
     </div>
     <div class="Datos"> 
     <label for="passwd">Contrase&ntilde;a</label>
     <input type="password" name="passwd" id="passwd"
     placeholder="qwe2458"
     pattern="[a-z] {3} [0-9] {4}"
     required/> 
      </div>
      
      <div class="Datos"> 
     <label for="passwd">Confirmar</label>
     <input type="password" name="passwd" id="passwd"
     placeholder="qwe2458"
     pattern="[a-z] {3} [0-9] {4}"
     required/> 
      </div>
      
     <div class="Datos"> 
      <label for="phone"> Telefono </label>
    <input type="telef" phone id="phone" 
     placeholder="47965453635">
      </div>
      
      <div class="Datos">
     	 <label for="mail"> Email </label>
     	<input type="mail" name="mail" id="mail" 
     	placeholder="ejemplo@gmail.com">
          </div>
     
      <div class="Datos">
    	 <label for="address"> Direccion Domicilio </label>
    	 <input type="address" name="address" id="address" 
      	placeholder="Plaza Dañin y Albatros">
      </div>
     </fieldset>
     <div>
     <button type="submit">  Registrar  </button>
	 </div>

    </form>	
</div>
</div>
</body>
 <br style="clear:both;" />

    </div>
    <div id="footer">   	   
	    <?php include("includes/footer.php"); ?>        
    </div>
</div>
<?php include("includes/bottom_page.php"); ?>
</html>
