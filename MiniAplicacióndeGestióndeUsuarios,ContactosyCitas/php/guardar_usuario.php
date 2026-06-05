<?php
// Incluir el archivo de conexión a la base de datos
include("../config/conexion.php");

// Recibir y procesar los datos enviados desde el formulario de registro
$nombre = $_POST['nombre'];                       // Nombre del usuario
$email = $_POST['email'];                          // Correo electrónico
$password = sha1($_POST['password']);              // Contraseña encriptada con SHA-1

// --- VERIFICACIÓN DE CORREO DUPLICADO ---
// Preparar consulta para verificar si el email ya existe en la base de datos
$verificar = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
$verificar->bind_param("s", $email);               // Vincular el parámetro email (tipo string)
$verificar->execute();                              // Ejecutar la consulta
$verificar->store_result();                         // Almacenar resultados para poder contar filas

// Verificar si ya existe un usuario con ese correo
if ($verificar->num_rows > 0) {
    // Si el correo ya existe, mostrar alerta y redirigir al formulario de registro
    echo "<script>
            alert('Este correo ya está registrado');
            window.location='../views/registro.php';
          </script>";
} else {
    // --- REGISTRO DE NUEVO USUARIO ---
    // Preparar consulta para insertar nuevo usuario (usando consultas preparadas por seguridad)
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $password);  // Vincular parámetros (3 strings)
    
    // Ejecutar la inserción y verificar si fue exitosa
    if ($stmt->execute()) {
        // Registro exitoso: mostrar mensaje y redirigir al formulario
        echo "<script>
                alert('Usuario registrado correctamente');
                window.location='../views/registro.php';
              </script>";
    } else {
        // Error en la inserción
        echo "Error al registrar usuario";
    }
}
?>