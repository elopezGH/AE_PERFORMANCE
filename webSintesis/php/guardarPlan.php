<?php

session_start();

$conexion = new mysqli('127.0.0.1', 'root', '', 'ae_performance');

$nombreComida = $_POST['nombreComida'];
$idUsuario = $_POST['idUsuario'];
$fecha = $_POST['fecha'];
$Cantidad = $_POST['Cantitat'];

$consultaMenjar = $conexion->query("SELECT ID_MENJAR FROM menjars WHERE NOM_MENJAR = '$nombreComida'");
$filaMenjar = $consultaMenjar->fetch_assoc();
$idMenjar = $filaMenjar['ID_MENJAR'];

$consulta = $conexion->query("INSERT INTO plans (ID_CLIENT, ID_MENJAR, DATA_INGESTA, CANTITAT) VALUES ('$idUsuario', '$idMenjar', '$fecha', '$Cantidad')");

if ($consulta) {
    header("Location: ../views/user_interface/user_interface.php");
} else {
    echo "Error al guardar el plan: " . $conexion->error;
}

$conexion->close();
?>
