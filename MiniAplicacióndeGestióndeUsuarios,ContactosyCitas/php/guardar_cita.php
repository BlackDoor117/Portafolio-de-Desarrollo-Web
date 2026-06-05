<?php
// Incluir el archivo de conexión a la base de datos
// Este archivo debe contener la configuración y establecer la variable $conn
include("../config/conexion.php");

// Recibir los datos enviados desde el formulario mediante método POST
$fecha = $_POST['fecha'];           // Fecha de la cita
$descripcion = $_POST['descripcion']; // Descripción o detalles de la cita
$usuario_id = $_POST['usuario_id'];   // ID del usuario que agenda la cita

// Construir la consulta SQL para insertar una nueva cita en la tabla 'citas'
// NOTA IMPORTANTE: Esta forma de insertar datos es vulnerable a inyección SQL
// Se recomienda usar consultas preparadas (prepared statements) para mayor seguridad
$sql = "INSERT INTO citas (fecha, descripcion, usuario_id)
        VALUES ('$fecha', '$descripcion', '$usuario_id')";

// Ejecutar la consulta utilizando el objeto de conexión $conn
$conn->query($sql);

// Enviar mensaje de confirmación al cliente/navegador
echo "Cita guardada";
header("Location: ../views/registro.php?mensaje=ok");
    exit();
?>