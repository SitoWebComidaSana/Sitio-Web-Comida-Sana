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
    
<!--------------Content--------------->
<section id="content">
	<div class="wrap-content zerogrid">
		<div class="row block">
			<div id="main-content" class="col-full">
				<div class="col-1-3">
					<div class="wrap-col">
						<article>
							<h2><a href="#">Reservas</a></h2>
							<img src="images/reservacion1.jpg"/>
							<p>¡Es el momento de reservar!

Puede reservar una mesa en el horario siguiente:

 

ABIERTO TODOS LOS DIAS A PARTIR DE LAS 08:00

 

Atenderemos gustosamente su petición de reserva ya sea por teléfono o directamente a través de nuestro formulario en línea.

 

Reservas por teléfono

99999999 


Reservas a través del <a href="pages.php?page=reservalinea"> formulario en línea</a> [...]</p>
						</article>
					</div>
				</div>
				<div class="col-1-3">
					<div class="wrap-col">
						<article>
							<h2><a href="#">Servicios a Domicilio</a></h2>
							<img src="images/servicesdomicilio.jpg"/>
							<p>Si va a celebrar una ocasión especial y desea disfrutar de los mejores platos en la comodidad de su hogar, puede utilizar nuestro exclusivo servicio a domicilio.

Utilice nuestro formulario de contacto para acordar el menú y la fecha. Estaremos encantados de poner a su disposición toda nuestra cocina y buen hacer.[...]</p>
						</article>
					</div>
				</div>
				
</section>
</body>


        
        <br style="clear:both;" />

    </div>
    <div id="footer">   	   
	    <?php include("includes/footer.php"); ?>        
    </div>
</div>
<?php include("includes/bottom_page.php"); ?>
</html>
