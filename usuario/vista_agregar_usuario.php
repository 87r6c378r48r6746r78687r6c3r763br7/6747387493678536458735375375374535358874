<!DOCTYPE html>
<html>
<head>

	<?php echo $modelo->ObtenerCabecera($origen); ?>

	<style type="text/css">
		p, .texto{
	        font-size:9pt;
	        line-height: 20px;
	        font-family:Arial;
	        text-transform: uppercase;
	        font-variant: small-caps;
	    }

	    h1, .tema{
	        font-family:Calibri;
	        border-bottom:solid 3px #243972;
	        font-variant: small-caps;
	        font-weight: bold;
	        font-size:14pt;
	        text-transform: uppercase;
	    }

	    .caja{
	        padding: 5px;
	        border:solid 1px gray;
	        width: 150px;
	        font-family: Arial;
	        font-size:9pt;
	        text-transform: uppercase;
			border-collapse: collapse; 
			border-color: #c9d1ec; 
			color: #000000; 
	    }		
	</style>
	
</head>
<body>

	<?php

	$contenido = "
	<form method='POST' action='". $_SERVER['PHP_SELF'] ."' enctype='multipart/form-data' onsubmit=''>
	    <center>
	    <fieldset style='width:50%;font-family:verdana;font-size:9pt;text-align:center;'>
	    <legend class=tema style='text-align:left;'>&nbsp;&nbsp; &raquo;  REGISTRO DE CLIENTE &nbsp;&nbsp;</legend>
	    
	    <table align=center border='0' style='width:425px;border-collapse:collapse;font-family:verdana;font-size:9pt;'>
	    <tr>
	        <td colspan='2'>&nbsp;</td>
	    </tr>
	    <tr class='texto'>
	        <td>Fecha de pago:</td>
	        <td><input type=text name='usuario' class='caja' style='width:200px;' value=''></td>
	    </tr>
	    <tr class='texto'>
	        <td>Nombre:</td>
	        <td><input type=text name='nombre' class='caja' style='width:200px;' value=''></td>
	    </tr>
	    <tr class='texto'>
	        <td>Apellido:</td>
	        <td><input type=text name='apellido' class='caja' style='width:200px;' value=''></td>
	    </tr>
	    <tr>
	        <td colspan='2'>&nbsp;</td>
	    </tr>
	    <tr>
	        <td colspan='2'>&nbsp;</td>
	    </tr>
	    <tr class='texto'>
	        <td>Pago: </td>
	        <td>". $cmbNiveles ."</td>
	    </tr>
	    <tr>
	        <td colspan='2'>&nbsp;</td>
	    </tr>
	    <tr>
	        <td class='texto' colspan='2'><hr></td>
	    </tr>
	    <tr>
	        <td colspan=2 align='center'>
	        <input type='submit' value='Guardar Datos' style='width:150px;' class=''>
	        <a href='controlador_admin_usuario.php'>
				<input type='button' value='Cancelar' name='cancelar' style='width:150px;' class=''>
			</a>
	    </tr>
	    <tr>
	        <td class='texto' colspan='2'>&nbsp;</td>
	    </tr>
	    </table>

	    </fieldset>
	    </center>
    </form>";

	?>

	<?php echo $modelo->ObtenerEncabezado($origen); ?>
	<?php echo $modelo->ObtenerMenu($origen); ?>
	<?php echo $modelo->ObtenerCuerpo($origen,$contenido); ?>
	<?php echo $modelo->ObtenerPieDePagina($origen); ?>	
	
</body>
</html>