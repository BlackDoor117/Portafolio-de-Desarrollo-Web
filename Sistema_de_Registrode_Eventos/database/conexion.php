<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Dirección del servidor de la base de datos
$usuario = "root"; // Nombre de usuario de la base de datos
$contrasena = ""; // Contraseña de la base de datos
$base_datos = "registro_evento"; // Nombre de la base de datos

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
die("Error de conexión: " . $conexion->connect_error);
}

// Establecer el juego de caracteres de la conexión a UTF-8
$conexion->set_charset("utf8");
?>