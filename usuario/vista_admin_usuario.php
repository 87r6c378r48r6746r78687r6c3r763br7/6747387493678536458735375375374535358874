<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/styles.css">
	<?php echo $modelo->ObtenerCabecera($origen); ?>
</head>
<body>

	<?php

	$criterio = "";
	$deleteUser = "";

	if (isset($_GET["criterio"])) {
		$criterio = $_GET["criterio"];
	}

	if (isset($_GET["deleteUser"])) {
		$deleteUser = $_GET["deleteUser"];

		if ($conexion->consultar("DELETE FROM tb_usuarios WHERE id_usuario='$deleteUser'")) {
			echo "
			<script>
				alert('USUARIO ELIMINADO CON EXITO');
				location.replace('$_SERVER[PHP_SELF]');
			</script>";
		}
	}

	// Mapeo de tipos de usuario
	$tipos = [
		"0" => "Promoción",
		"1" => "Mes",
		"2" => "Quincena",
		"3" => "Día"
	];

	$contenido = "
	<script>
		function eliminar(idusuario) {
			if (confirm('ESTA SEGURO QUE DESEA ELIMINAR ESTE USUARIO')) {
				location.replace('$_SERVER[PHP_SELF]?deleteUser=' + idusuario);
			}
		}
	</script>

	<center>
		<br>
		<table class='vista-clientes' style='border-collapse: collapse; border-color: #c9d1ec; color: #000000; font-size: 1.5rem'>
		<tr>
			<td colspan='6'>
				<form name='buscarusuario' action='". $_SERVER['PHP_SELF'] ."' method='GET'>
					<table border='0' style='width:100%;' cellpadding='15' cellspacing='0'>
					<tr>
						<td>
							<img src='". $origen ."/image/search.png'>
							Buscar Cliente : <input type='text' name='criterio' value='". $criterio ."' style='width:250px;' autofocus>
						</td>
						<td style='text-align:right;'>
							<input type='submit' value='Buscar' name='Buscar' style='width:150px;'>
							<a href='controlador_agregar_usuario.php'>
								<input type='button' value='Nuevo Usuario' name='nuevo' style='width:175px;'>
							</a>
						</td>
					</tr>
					</table>
				</form>
			</td>
		</tr>
		<tr>
			<th>#</th>
			<th style='text-align:left;'>Cliente</th>
			<th>Fecha de Pago</th>
			<th>Tipo de Usuario</th>
			<th>Eliminar</th>
		</tr>";

		$sql = "SELECT tb_usuarios.id_usuario,
					   tb_usuarios.nombre_usuario,
					   tb_usuarios.apellido_usuario,
					   tb_usuarios.usuario,
					   tb_usuarios.tipo
				FROM tb_usuarios";

		if ($criterio != "") {
			$sql .= " WHERE tb_usuarios.nombre_usuario LIKE '%". $criterio ."%'
					   OR tb_usuarios.apellido_usuario LIKE '%". $criterio ."%'
					   OR tb_usuarios.usuario LIKE '%". $criterio ."%' ";
		}

		$sql .= " ORDER BY tb_usuarios.id_usuario DESC ";

		$query = $conexion->consultar($sql);

		if (mysqli_num_rows($query) > 0) {
			$contado = 1;
			while ($fila = mysqli_fetch_assoc($query)) {
				// Asignar el tipo de usuario usando el arreglo $tipos
				$tipo_usuario = isset($tipos[$fila["tipo"]]) ? $tipos[$fila["tipo"]] : "Desconocido";

				$contenido .= "
				<tr>
					<td style='text-align:center;width:50px;'>". $contado ."</td>
					<td style='text-align:left;width:250px;'>". $fila["nombre_usuario"] ." ". $fila["apellido_usuario"] ."</td>
					<td style='text-align:center;width:150px;'>". $fila["usuario"] ."</td>
					<td style='text-align:center;width:150px;'>". $tipo_usuario ."</td>
					<td style='text-align:center;width:100px;'>
						<a idusuario=". $fila["id_usuario"] .">
							<img src='". $origen ."/image/delete.png' title='ELIMINAR USUARIO' style='cursor:pointer;' border='0' onclick=\"eliminar('". $fila["id_usuario"] ."');\">
						</a>
					</td>
				</tr>";
				$contado++;
			}
		} else {
			$contenido .= "
			<tr>
				<td colspan='6' style='text-align:center;'>NO SE ENCONTRARON REGISTROS</td>
			</tr>";
		}

		$contenido .= "
		</table>
		</center>
		<br><br><br><br><br><br><br>";
	?>

	<?php echo $modelo->ObtenerEncabezado($origen); ?>
	<?php echo $modelo->ObtenerMenu($origen); ?>
	<?php echo $modelo->ObtenerCuerpo($origen, $contenido); ?>
	<?php echo $modelo->ObtenerPieDePagina($origen); ?>	
	
</body>
</html>