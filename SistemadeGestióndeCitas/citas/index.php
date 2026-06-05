<?php
session_start();
include("../config/database.php");

if(!isset($_SESSION['usuario'])){
header("Location: ../views/login.php");
}

/* Guardar cita */
if(isset($_POST['guardar'])){
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$usuario=$_SESSION['id'];

$sql=$conexion->prepare("INSERT INTO citas(fecha,hora,usuario_id) VALUES(?,?,?)");
$sql->execute([$fecha,$hora,$usuario]);
}

/* Eliminar cita */
if(isset($_GET['eliminar'])){
$id=$_GET['eliminar'];

$sql=$conexion->prepare("DELETE FROM citas WHERE id=?");
$sql->execute([$id]);
}

$hoy=date("Y-m-d");

/* Próximas citas */
$sql=$conexion->prepare("
SELECT citas.*, usuarios.nombre
FROM citas
INNER JOIN usuarios ON citas.usuario_id = usuarios.id
WHERE citas.fecha >= ?
ORDER BY citas.fecha ASC
");
$sql->execute([$hoy]);
$citas=$sql->fetchAll();

/* Historial */
$sql2=$conexion->prepare("
SELECT citas.*, usuarios.nombre
FROM citas
INNER JOIN usuarios ON citas.usuario_id = usuarios.id
WHERE citas.fecha < ?
ORDER BY citas.fecha DESC
");
$sql2->execute([$hoy]);
$historial=$sql2->fetchAll();
?>

<link rel="stylesheet" href="../assets/style.css">

<h2>Administrar Citas</h2>

<p>
Bienvenido al módulo de citas médicas. Aquí podrás agendar consultas,
dar seguimiento a tus próximas citas y revisar tu historial médico.
</p>

<form method="POST">
<input type="date" name="fecha" required>
<input type="time" name="hora" required>
<button name="guardar">Guardar</button>
</form>

<h3>Próximas Citas</h3>

<?php foreach($citas as $fila){ ?>
<div class="cita-box">

<strong><?php echo $fila['nombre']; ?></strong><br>
<?php echo $fila['fecha']; ?> -
<?php echo $fila['hora']; ?>

<a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a>
<a href="?eliminar=<?php echo $fila['id']; ?>">Eliminar</a>

</div>
<?php } ?>

<button onclick="toggleHistorial()">Historial de Citas</button>

<div id="historial" style="display:none; margin-top:20px;">

<h3>Citas Realizadas</h3>

<?php foreach($historial as $fila){ ?>
<div class="cita-box">

<strong><?php echo $fila['nombre']; ?></strong><br>
<?php echo $fila['fecha']; ?> -
<?php echo $fila['hora']; ?>

<a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a>
<a href="?eliminar=<?php echo $fila['id']; ?>">Eliminar</a>

</div>
<?php } ?>

</div>

<br><br>
<a href="../views/panel.php">Volver</a>

<script>
function toggleHistorial(){
var x=document.getElementById("historial");

if(x.style.display=="none"){
x.style.display="block";
}else{
x.style.display="none";
}
}
</script>