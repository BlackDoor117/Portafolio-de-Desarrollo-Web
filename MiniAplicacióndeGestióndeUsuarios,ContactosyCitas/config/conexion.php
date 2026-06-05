<?php
// Configuración de la conexión a la base de datos
$host = "localhost"; // Servidor donde se encuentra la base de datos (local)
$user = "root";      // Usuario de MySQL (por defecto en entornos locales)
$pass = "";          // Contraseña de MySQL (vacía en configuraciones por defecto de XAMPP/WAMP)
$db = "mini_app";    // Nombre de la base de datos a la que nos conectaremos

// Crear una nueva conexión a MySQL usando MySQLi (interfaz mejorada de MySQL)
$conn = new mysqli($host, $user, $pass, $db);

// Verificar si hubo algún error en la conexión
if ($conn->connect_error) {
    // Si hay error, detener la ejecución y mostrar el mensaje de error
    die("Error de conexión: " . $conn->connect_error);
}
// Si no hay error, la conexión se establece correctamente
// La variable $conn estará disponible para realizar consultas a la BD
?>