<!DOCTYPE html>
<html>
<head>

	<?php echo $modelo->ObtenerCabecera($origen); ?>
	
</head>
<body>

	<?php
	$contenido = "
	<center>
		<br><br><br><br><br>
		<h1>
			SISTEMA DE REGISTRO DE CLIENTES
			<br>
			<span style='font-size:40px;'>TAZMANIA GYM</span></span>
		</h1>
		<br><br><br><br><br>
	</center>	";
	?>

	<?php echo $modelo->ObtenerEncabezado($origen); ?>
	<?php echo $modelo->ObtenerMenu($origen); ?>
	<?php echo $modelo->ObtenerCuerpo($origen,$contenido); ?>
	<?php echo $modelo->ObtenerPieDePagina($origen); ?>	
	
</body>
</html>