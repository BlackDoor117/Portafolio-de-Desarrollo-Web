<?php
include '../database/conexion.php'; // Incluye el archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

// Validación de datos

if (empty($nombre) || empty($email) || empty($telefono)) { echo "Por favor, completa todos los campos.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { echo "Formato de correo electrónico inválido.";
} elseif (!preg_match('/^\d{10}$/', $telefono)) { echo "Número de teléfono inválido.";
} else {

// Procesar el formulario (almacenamiento en la base de datos, envío de correos electrónicos, etc.)
// Consulta SQL para insertar datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES (?, ?, ?)";

$sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conexion, $sql);

if (!$stmt) {
    die("Error en prepare: " . mysqli_error($conexion));
}

if (!mysqli_stmt_bind_param($stmt, "sss", $nombre, $email, $telefono)) {
    die("Error en bind: " . mysqli_stmt_error($stmt));
}

if (!mysqli_stmt_execute($stmt)) {
    die("Error en execute: " . mysqli_stmt_error($stmt));
}

echo "¡Registro exitoso!";
echo "<br>Filas insertadas: " . mysqli_stmt_affected_rows($stmt);

}
}
?>