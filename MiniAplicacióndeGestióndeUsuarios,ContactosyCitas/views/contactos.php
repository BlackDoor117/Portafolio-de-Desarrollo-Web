<!DOCTYPE html>
<html>
<head>
    <title>Contactos</title>
    <!-- Importar archivo CSS externo para los estilos de la página -->
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

<div class="container">
    <h2>Registro de Contacto</h2>

    <!-- Formulario para registrar un nuevo contacto en la agenda -->
    <!-- Los datos se enviarán mediante método POST al archivo guardar_contacto.php -->
    <form action="../php/guardar_contactos.php" method="POST">
        
        <!-- Campo para ingresar el nombre completo del contacto -->
        <input type="text" name="nombre" placeholder="Nombre del contacto" required>
        
        <!-- Campo para ingresar el número de teléfono del contacto -->
        <input type="text" name="telefono" placeholder="Teléfono" required>
        
        <!-- Campo para ingresar el ID del usuario propietario del contacto -->
        <!-- Relaciona el contacto con un usuario específico en la base de datos -->
        <input type="number" name="usuario_id" placeholder="ID del Usuario" required>
        
        <!-- Botón para enviar el formulario y guardar el contacto -->
        <input type="submit" value="Guardar Contacto">
    </form>

    <!-- Enlace para regresar a la página principal de registro -->
    <a href="registro.php">Volver</a>
</div>

</body>
</html>