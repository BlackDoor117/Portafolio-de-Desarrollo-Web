<?php
session_start();
include("../config/database.php");

if(!isset($_GET['id'])){
header("Location: index.php");
exit();
}

$id=$_GET['id'];

$sql=$conexion->prepare("SELECT * FROM citas WHERE id=?");
$sql->execute([$id]);
$cita=$sql->fetch();

if(!$cita){
header("Location: index.php");
exit();
}

if($_POST){

$fecha=$_POST['fecha'];
$hora=$_POST['hora'];

$sql=$conexion->prepare("UPDATE citas SET fecha=?, hora=? WHERE id=?");
$sql->execute([$fecha,$hora,$id]);

header("Location: index.php");
exit();
}
?>

<link rel="stylesheet" href="../assets/style.css">

<h2>Editar Cita</h2>

<form method="POST">
<input type="date" name="fecha" value="<?php echo $cita['fecha']; ?>" required><br>
<input type="time" name="hora" value="<?php echo $cita['hora']; ?>" required><br>
<button type="submit">Actualizar</button>
</form>

<a href="index.php">Volver</a>