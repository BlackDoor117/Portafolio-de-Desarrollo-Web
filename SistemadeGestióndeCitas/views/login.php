<?php
session_start();
include("../config/database.php");

if($_POST){
$correo=$_POST['correo'];
$password=$_POST['password'];

$sql=$conexion->prepare("SELECT * FROM usuarios WHERE correo=?");
$sql->execute([$correo]);
$user=$sql->fetch();

if($user && password_verify($password,$user['password'])){
$_SESSION['usuario']=$user['nombre'];
$_SESSION['id']=$user['id'];

header("Location: panel.php");
}else{
echo "Datos incorrectos";
}
}
?>

<link rel="stylesheet" href="../assets/style.css">

<h2>Login</h2>

<form method="POST">
<input type="email" name="correo" placeholder="Correo" required><br>
<input type="password" name="password" placeholder="Contraseña" required><br>
<button type="submit">Entrar</button>
</form>

<a href="registro.php">Registrarse</a>