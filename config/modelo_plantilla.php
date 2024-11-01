<?php

class plantilla{

	public function ObtenerCabecera($origen){
		# code...
		return '
		<title>-TASMANIA GYM-</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="'. $origen .'/css/styles.css">';
	}
	
	public function ObtenerEncabezado($origen){
		# code...
		return '
		<header>
					
		</header>';
	}

	public function ObtenerMenu($origen){
		# code...
		return '
		<nav>
			<section class="nav-logo">
				<a href="'. $origen .'/index.php" style="width:150px;height: 50px;""><img src="/image/logo.jpg"></a>
			</section>
			<ul>
				<li><a href="'. $origen .'/usuario/controlador_admin_usuario.php">CLIENTES</a></li>
			</ul>
		</nav>';
	}

	public function ObtenerCuerpo($origen,$contenido){
		# code...
		return  '
		<section>
		'. $contenido .'
		</section>'
		;
	}

	public function ObtenerPieDePagina($origen){
		# code...
		return '
		<footer>
		</footer>';
	}
}
?>