<?php
include("../config/database.php");

if($_POST){
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$password=password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql=$conexion->prepare("INSERT INTO usuarios(nombre,correo,password) VALUES(?,?,?)");
$sql->execute([$nombre,$correo,$password]);

header("Location: login.php");
}
?>

<link rel="stylesheet" href="../assets/style.css">

<h2>Registro</h2>

<form method="POST">
<input type="text" name="nombre" placeholder="Nombre" required><br>
<input type="email" name="correo" placeholder="Correo" required><br>
<input type="password" name="password" placeholder="Contraseña" required><br>
<button type="submit">Registrarse</button>
</form>

<a href="login.php">Login</a>