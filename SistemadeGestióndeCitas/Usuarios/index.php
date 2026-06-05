<?php
session_start();
include("../config/database.php");

if(isset($_GET['eliminar'])){

$id = $_GET['eliminar'];

/* borrar citas del usuario primero */
$sql=$conexion->prepare("DELETE FROM citas WHERE usuario_id=?");
$sql->execute([$id]);

/* borrar usuario */
$sql2=$conexion->prepare("DELETE FROM usuarios WHERE id=?");
$sql2->execute([$id]);

header("Location: index.php");
exit();
}

$sql=$conexion->query("SELECT * FROM usuarios");
$usuarios=$sql->fetchAll();
?>

<link rel="stylesheet" href="../assets/style.css">

<h2>Usuarios Registrados</h2>

<a href="agregar.php">Agregar Usuario</a><br><br>

<?php foreach($usuarios as $fila){ ?>
<p>
<?php echo $fila['nombre']; ?> -
<?php echo $fila['correo']; ?>

<a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a>

<a href="?eliminar=<?php echo $fila['id']; ?>">Eliminar</a>
</p>
<?php } ?>

<a href="../views/panel.php">Volver</a>