<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <!-- Importar archivo CSS externo para los estilos de la página -->
    <link rel="stylesheet" href="../assets/css/estilos.css">
    
    <!-- Script de validación del lado del cliente -->
    <script>
        // Función que se ejecuta antes de enviar el formulario
        function validarFormulario() {
            // Obtener los valores de los campos del formulario usando el nombre del formulario
            let nombre = document.forms["formRegistro"]["nombre"].value;
            let email = document.forms["formRegistro"]["email"].value;
            let password = document.forms["formRegistro"]["password"].value;

            // Validar que ningún campo esté vacío
            if (nombre == "" || email == "" || password == "") {
                // Mostrar alerta al usuario
                alert("Todos los campos son obligatorios");
                // Retornar false para evitar el envío del formulario
                return false;
            }
            // Si todos los campos están llenos, retornar true para permitir el envío
            return true;
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Registro de Usuario</h2>

    <!-- Formulario de registro con validación JavaScript -->
    <!-- onsubmit intercepta el envío y ejecuta la validación primero -->
    <form name="formRegistro" action="../php/guardar_usuario.php" method="POST" onsubmit="return validarFormulario()">
        
        <!-- Campo para nombre completo - tipo texto -->
        <input type="text" name="nombre" placeholder="Nombre completo" required>
        
        <!-- Campo para email - tipo email valida formato básico de correo -->
        <input type="email" name="email" placeholder="Correo electrónico" required>
        
        <!-- Campo para contraseña - tipo password oculta los caracteres -->
        <input type="password" name="password" placeholder="Contraseña" required>
        
        <!-- Botón de envío del formulario -->
        <input type="submit" value="Registrar">
    </form>

    <!-- Enlaces de navegación a otras secciones de la aplicación -->
    <a href="contactos.php">Ir a Contactos</a>
    <a href="citas.php">Ir a Citas</a>
</div>

</body>
</html>