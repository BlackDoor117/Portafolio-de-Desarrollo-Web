<?php
// Incluir el archivo de conexión a la base de datos
// Este archivo debe contener la configuración y establecer la variable $conn
include("../config/conexion.php");

// Recibir los datos enviados desde el formulario mediante método POST
$nombre = $_POST['nombre'];           // Nombre del contacto
$telefono = $_POST['telefono'];       // Número de teléfono del contacto
$usuario_id = $_POST['usuario_id'];   // ID del usuario al que pertenece el contacto

// Construir la consulta SQL para insertar un nuevo contacto en la tabla 'contactos'
// NOTA IMPORTANTE: Esta forma de insertar datos es vulnerable a inyección SQL
// Se recomienda usar consultas preparadas (prepared statements) para mayor seguridad
$sql = "INSERT INTO contactos (nombre, telefono, usuario_id)
        VALUES ('$nombre', '$telefono', '$usuario_id')";

// Ejecutar la consulta utilizando el objeto de conexión $conn
$conn->query($sql);

// Enviar mensaje de confirmación al cliente/navegador
echo "Contacto guardado";
header("Location: ../views/registro.php?mensaje=ok");
    exit();
    
?>