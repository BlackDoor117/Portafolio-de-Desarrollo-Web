<?php
include("../config/database.php");

$id=$_GET['id'];

$sql=$conexion->prepare("SELECT * FROM usuarios WHERE id=?");
$sql->execute([$id]);
$user=$sql->fetch();

if($_POST){
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];

$sql=$conexion->prepare("UPDATE usuarios SET nombre=?, correo=? WHERE id=?");
$sql->execute([$nombre,$correo,$id]);

header("Location: index.php");
}
?>

<link rel="stylesheet" href="../assets/style.css">

<h2>Editar Usuario</h2>

<form method="POST">
<input type="text" name="nombre" value="<?php echo $user['nombre']; ?>"><br>
<input type="email" name="correo" value="<?php echo $user['correo']; ?>"><br>
<button type="submit">Actualizar</button>
</form>