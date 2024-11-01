<?php
	$origen = "..";
	$contenido = "";
	include $origen."/config/modelo_plantilla.php";
	include $origen."/config/conexion.php";
	$modelo = new plantilla();
	$conexion = new conexionBD();

	// Verificar si se envió el formulario
	if ($_POST) {
		// Asignar variables de los datos recibidos de POST
		$user = $_POST["usuario"];
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$tipoUsuario = $_POST["tipoU"];
		
		// Obtener la fecha actual y calcular la fecha de expiración según el tipo de usuario seleccionado
		$fecha_actual = date('Y-m-d');
		switch ($tipoUsuario) {
			case '3': // Día
				$fecha_expiracion = date('Y-m-d', strtotime($fecha_actual . ' + 1 day'));
				break;
			case '2': // Quincena
				$fecha_expiracion = date('Y-m-d', strtotime($fecha_actual . ' + 15 days'));
				break;
			case '1': // Mes
				$fecha_expiracion = date('Y-m-d', strtotime($fecha_actual . ' + 30 days'));
				break;
			default:
				$fecha_expiracion = null; // Sin fecha de expiración
		}
		
		// Insertar el nuevo usuario en la base de datos
		$AgregarRegistro = "INSERT INTO tb_usuarios (nombre_usuario, apellido_usuario, usuario, tipo, fecha_expiracion)
							VALUES ('$nombre', '$apellido', '$user', '$tipoUsuario', '$fecha_expiracion')";
		
		if ($conexion->consultar($AgregarRegistro)) { // Si la inserción fue exitosa
			echo "
			<script>
				alert('REGISTRO GUARDADO EXITOSAMENTE');
				window.top.location.replace('controlador_admin_usuario.php');
			</script>";
		} else {   // Error al guardar el registro
			echo "
			<script>
				alert('Error interno de aplicacion consulte con el administrador del sistema');
			</script>";
		}
		
		$conexion->cerrar();	
	}

	// Generar el combo box para el tipo de usuario
	$nTipos = array("3", "2", "1", "0");
    $aLetrasNiveles = array("Día", "Quincena", "Mes", "Promoción");

    $cmbNiveles = "<select name='tipoU' style='width:200px;font-family:Calibri;font-size:10pt;'>";
    foreach ($nTipos as $index => $item) {
        $cmbNiveles .= "<option value='". $item ."'>". $aLetrasNiveles[$index] ."</option>";
    }
    $cmbNiveles .= "</select>";

	include "vista_agregar_usuario.php";
?>