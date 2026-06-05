<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/estilos.css">
    <title>Formulario de eventos</title>
</head>
<body>
     <div class="container">
        <form onsubmit="return validarFormulario();" method="post" action="./backend/procesar_formulario.php">
            <h2>Registro de Evento</h2>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="number">Número de teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>

            <button type="submit">Enviar</button>
        </form>
    </div>
    <script src="./public/js/validacion.js"></script>
</body>
</html>