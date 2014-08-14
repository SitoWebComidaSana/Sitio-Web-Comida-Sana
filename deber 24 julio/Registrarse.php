<?php
error_reporting(E_ALL & ~E_NOTICE);

require_once("ClasesPHP/ReglasNegocio/clsPersona.php");




//Registramos los datos
if($_POST)
{
    
	
                $objpersona=new clsPersona($_POST["txtNombres"],$_POST["txtApellidos"],$_POST["txtDireccion"],$_POST["txtTelefono"],$_POST["txtEmail"],
                                           $objciudades,$_POST["txtNick"],$_POST["txtPassword"],$imagen,$img["TipoImagen"]);

                $respuesta=$objpersona->RegistrarUsuario(); 
                if (!$respuesta)
                {
                  echo "<script>alert('Los Datos del Usuario no se registraron correctamente');</script>";
                  $mensaje="Error en el Registro de los Datos";
                }
                else
                {
                   echo "<script>alert('Los Datos del Usuario se registraron correctamente');</script>" ;
                   $mensaje="Datos Registrados Correctamente";
                }
                
             
         

     
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrarse</title>
<link href="css/cssCopyright.css" rel="stylesheet" type="text/css" />
<script src="javascript/javascript.js"></script>
<script src="jsquery/jquery.js"></script>
<script src="jsquery/jquery.validate.js"></script>
<script src="javascript/funcionesJQ.js"></script>
<script src="javascript/funcionesJS.js"></script>
<script type="text/javascript" src="stmenu.js"></script>

</head>

<body bgcolor="#F0DB9B">

<table width="86%"  align="center" cellpadding="0" cellspacing="0">
  <tr>
  	<td colspan="2"><hr/></td>
  </tr>
	
	<tr>
    	<td><img src="imagenes/Banner_blogs.gif" width="100%" height="153" border="1" /></td>
    </tr>
  <tr>
  	<td colspan="2"><hr/></td>
  </tr>
	
    
    
     <tr>
  	<td colspan="2" valign="top"><a href="http://www.dhtml-menu-builder.com"  style="display:none;visibility:hidden;">Drop Down Menu</a>
<script type="text/javascript">
<!--
stm_bm(["menu5df9",970,"","blank.gif",0,"","",0,0,250,0,1000,1,0,0,"","100%",67108955,0,1,2,"default","hand","",1,25],this);
stm_bp("p0",[0,4,0,0,0,0,18,0,100,"",-2,"",-2,50,0,0,"#799BD8","transparent","tclback.gif",3,0,0,"#000000"]);
stm_ai("p0i0",[1,"Inicio","","",-1,-1,0,"index.php","_self","","","","tclarrow.gif",18,7,0,"","",0,0,0,1,1,"#FFFFF7",1,"#B5BED6",1,"","tclbackup.gif",2,3,0,0,"#FFFFF7","#000000","#666666","#FFFFFF","bold 8pt Arial","bold 8pt Arial",0,0,"","","","",0,0,0],100,22);
stm_aix("p0i1","p0i0",[1,"Quienes Somos","","",-1,-1,0,"QuienesSomos.php","_self","","","","tclarrow.gif",18,7,0,"","",0,0,0,1,1,"#FFFFF7",1,"#B5BED6",1,"","tclbackup.gif",3],270,22);
stm_aix("p0i2","p0i1",[1,"Registrate","","",-1,-1,0,"Registrarse.php"],200,22);
stm_aix("p0i3","p0i1",[1,"Contactos","","",-1,-1,0,"Contactos.php"],230,22);
stm_aix("p0i4","p0i1",[1,"Administrar Blog","","",-1,-1,0,"AdministrarBlog.php"],245,22);
stm_ep();
stm_em();
//-->
</script>
</td>
  </tr>
  <tr>
  	<td colspan="2">
    	<hr />
    </td>
  </tr>
  <tr>
   <td colspan="2">
   	<table align="center" cellpadding="0" cellspacing="0" width="86%">
    	<tr>
        	<td valign="top" align="center"><img src="imagenes/imagen_registro.gif" width="300" height="492" /></td>
           	 <td valign="top" align="">
             <div align="center" class="cssdiv" id="Registro">
             
               <form id="FormularioRegistrarse" name="FormularioRegistrarse" action="Registrarse.php"  method="post" enctype="multipart/form-data" target="_self">
                 <table cellpadding="1" cellspacing="1">
                 	 <tr>
                     	<td colspan="3" align="center" valign="top" class="cssWarings"><label id="lblMensaje" for="mensaje"><?php echo $mensaje ?></label></td>
                     </tr>
                     <tr>
                       <td colspan="3" align="center"><img src="imagenes/registro-de-usuarios.gif" width="309" height="26" /></td>
                     </tr> 
                     <tr>
                     	<td colspan="3"><hr /></td>
                     </tr>
                    
                     <tr>
                   	   <td align="left" valign="top"><label class="cssDatos" id="lblFoto">Foto</label></td>
                     	<td colspan="2" valign="top" align="left">
                        	<table cellpadding="4" cellspacing="1">
                             <tr>
                             	<td class="cssWarings" valign="top"><input type="file" tabindex="1" class="cssbotonFotos"  name="file" id="file"  value="<?php echo $imagen_defecto ?>"/></td>
                             </tr>
                             </table>                        </td>
                     </tr>
              <tr>
                       <td align="left" valign="top" ><label id="lblnombres" for="Nombres"><span class="cssDatos">Nombres</span></label></td>
                       <td align="left"  class="cssWarings"> <input name="txtNombres" class="cssOtrosDatos2" tabindex="2" id="txtNombres" size="20" maxlength="200" value="<?php echo $_REQUEST["txtNombres"]; ?>" /></td>
                      <td align="left" rowspan="3">
                      	<table align="center" cellpadding="1" cellspacing="1">
                        	<tr>
                            	<td valign="top" align="center"><label id="lblImagen"><img id="ImgFoto" src="<?php echo $imagen_defecto ?>" width="142" height="135" name="imgFoto" hspace="3" vspace="3" border="2" /></label></td>
                            </tr>
                        </table>                      </td>
                     </tr>
                     <tr>
                       <td align="left" valign="top" ><label class="cssDatos" id="lblapellidos">Apellidos</label></td>
                       <td align="left" class="cssWarings"><input name="txtApellidos" type="text" tabindex="3" class="cssOtrosDatos2" id="txtApellidos" value="<?php echo $_REQUEST["txtApellidos"]; ?>" maxlength="200"/></td>
                     </tr>
                     <tr>
                       <td align="left" valign="top"><label class="cssDatos" id="lbldireccion">Direcci&oacute;n</label></td>
                       <td valign="top" align="left" class="cssWarings"><textarea name="txtDireccion" class="cssOtrosDatos2" maxlength="1000" tabindex="4" id="txtDireccion" rows="5" ><?php echo $_REQUEST["txtDireccion"]; ?></textarea></td>
                     </tr>
                     <tr>
                       <td align="left" valign="top"><label class="cssDatos" id="lblTelefono">Tel&#233;fono</label></td>
                       <td align="left" class="cssWarings"><input type="text" name="txtTelefono" class="cssOtrosDatos2" id="txtTelefono" tabindex="5" maxlength="15" value="<?php echo $_REQUEST["txtTelefono"]; ?>" />
                       </textarea></td>
                   </tr>
                      <tr>
                       <td align="left" valign="top"><label class="cssDatos" id="lblmail">Email</label></td>
                       <td align="left" class="cssWarings"><input type="text" name="txtEmail" class="cssOtrosDatos2" id="txtEmail" tabindex="6" value="<?php echo $_REQUEST["txtEmail"]; ?>"/>
                       </textarea></td>
                     </tr>
                     
                     
                     <tr>
                       <td align="left" valign="top"><label class="cssDatos" id="lblpais">Pa&#237;s</label></td>
                       <td align="left">
                        <select name="cmbPais" class="cssOtrosDatos2" id="cmbPais" tabindex="7">
        				<option selected="selected">Seleccione el Pa&#237;s</option>
                         <?php
                           
                            while($fila=mysql_fetch_array($resultset_pais))
                            {

                               echo "<option value='$fila[Code]'>$fila[Name]</option>";
    
                            }  
                         ?>
                        </select>                      
                       </td>
                     </tr>
                     <tr>
                       <td align="left" valign="top"><label class="cssDatos" id="lblProvincia">Provincia - Districto</label>                      </td>
                       <td align="left">
                       <select name="cmbProvincia"  class="cssOtrosDatos2" id="cmbProvincia" tabindex="8" disabled="disabled">
        				<option>Seleccione la Provincia</option>
                       </select>                       </td>
                     </tr>
                       <tr>
                       <td align="left" valign="top"><label class="cssDatos" id="lblCiudad">Ciudad</label></td>
                       <td align="left">
                       <select name="cmbCiudad" class="cssOtrosDatos2" id="cmbCiudad" tabindex="9" disabled="disabled">
        				<option>Seleccione la Ciudad</option>
                        </select>                        </td>
                     </tr>
                     <tr>
                     	 <td align="left"><label class="cssDatos" id="lblNick">Nick-Name</label></td>
                         <td align="left" class="cssWarings"><input type="text" id="txtNick" name="txtNick"  class="cssOtrosDatos2" tabindex="10" maxlength="15" value="<?php echo $_REQUEST['txtNick']; ?>"   /></td>
                     </tr>
                     <tr>
                     	 <td align="left"><label class="cssDatos" id="lblPassword">Contrase&#241;a</label></td>
                         <td align="left" class="cssWarings"><input type="password"id="txtPassword" name="txtPassword" tabindex="11" value="<?php echo $_REQUEST["txtPassword"]; ?>" class="cssOtrosDatos2" maxlength="10" /></td>
                     </tr>
                      <tr>
                     	 <td align="left"><label class="cssDatos" id="lblPassword">Repetir Contrase&#241;a</label></td>
                         <td align="left" class="cssWarings"><input type="password"id="txtConfirmarPassword" name="txtConfirmarPassword" tabindex="12"  class="cssOtrosDatos2"  value="<?php echo $_REQUEST["txtConfirmarPassword"]; ?>" maxlength="100" /></td>
                     </tr>
                     <tr>
                     <td align="center" colspan="2">
                     	<table align="center" cellpadding="1" cellspacing="1">
                        <tr>
                         	<td align="center"><input type="submit" name="btnRegistrar" id="btnRegistrar" value="Registrarse" class="cssboton" /></td>
                            <td align="center"><input type="button" name="btnLimpiarDatos" id="btnLimpiarDatos" value="Limpiar Datos" class="cssBotonesAcciones" onclick="location.href='Registrarse.php'" /></td>
                     	</tr>
                        </table>                    
                      </td>
                     </tr>
                   </table>
               </form>
             </div>
          </td>
        </tr>   
    </table>
   </td>
  </tr>
</table>
</body>
</html>
