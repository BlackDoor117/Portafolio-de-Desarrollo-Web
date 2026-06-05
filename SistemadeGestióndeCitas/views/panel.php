<?php
session_start();

if(!isset($_SESSION['usuario'])){
header("Location: login.php");
}
?>

<link rel="stylesheet" href="../assets/style.css">

<h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>

<a href="../citas/index.php">Administrar Citas</a><br>
<a href="../usuarios/index.php">Administrar Usuarios</a><br>
<a href="../logout.php">Cerrar Sesión</a>