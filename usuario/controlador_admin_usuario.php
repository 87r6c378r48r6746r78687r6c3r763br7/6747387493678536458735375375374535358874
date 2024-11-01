<?php
	$origen = "..";
	$contenido = "";
	include $origen."/config/modelo_plantilla.php";
	include $origen."/config/conexion.php";
	$modelo = new plantilla();
	$conexion = new conexionBD();
	include "vista_admin_usuario.php";
?>