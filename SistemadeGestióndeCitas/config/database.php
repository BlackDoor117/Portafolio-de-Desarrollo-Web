<?php
$conexion = new PDO("mysql:host=localhost;dbname=sistema_cita","root","");
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>