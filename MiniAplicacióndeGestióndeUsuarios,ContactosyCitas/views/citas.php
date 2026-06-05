<!DOCTYPE html>
<html>
<head>
    <title>Citas</title>
    <!-- Importar archivo CSS externo para los estilos de la página -->
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

<div class="container">
    <h2>Registro de Cita</h2>

    <!-- Formulario para registrar una nueva cita -->
    <!-- Los datos se enviarán mediante método POST al archivo guardar_cita.php -->
    <form action="../php/guardar_cita.php" method="POST">
        
        <!-- Campo para seleccionar la fecha de la cita -->
        <input type="date" name="fecha" required>
        
        <!-- Campo para ingresar la descripción o detalles de la cita -->
        <input type="text" name="descripcion" placeholder="Descripción" required>
        
        <!-- Campo para ingresar el ID del usuario al que pertenece la cita -->
        <input type="number" name="usuario_id" placeholder="ID del Usuario" required>
        
        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Guardar Cita">
    </form>

    <!-- Enlace para regresar a la página de registro principal -->
    <a href="registro.php">Volver</a>
</div>

</body>
</html>