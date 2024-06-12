<?php
session_start();

if (!isset($_SESSION['id'])) {
    die("Error: Cliente no autenticado.");
}

$fechaActual = date("Y-m-d");
$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'ae_performance';
$element = $_POST['id'];
$idClient = $_SESSION['id'];

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$sql = "INSERT INTO inscripcions (DATA_INSCRIPCIO, CLIENT, TARIFA_CONTRACTADA) VALUES ('$fechaActual', '$idClient', '$element')";

if ($mysqli->query($sql) === TRUE) {
    echo "OKS";
} else {
    echo "Error al guardar el metabolismo en la base de datos: " . $mysqli->error;
}

$mysqli->close();
?>
