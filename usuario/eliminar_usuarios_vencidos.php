<?php
// Conexión a la base de datos
$pdo = new PDO('mysql:host=localhost;dbname=nombre_base_datos', 'usuario', 'contraseña');

// Elimina usuarios cuya fecha de expiración ha pasado
$stmt = $pdo->prepare("DELETE FROM usuarios WHERE fecha_expiracion <= CURDATE()");
$stmt->execute();
?>
