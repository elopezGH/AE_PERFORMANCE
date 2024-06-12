<?php
session_start();

$tmb = $_POST['tmb'];


$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'ae_performance';

$mysqli = new mysqli($host, $username, $password, $dbname);


if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}


$sql = "UPDATE clients SET METABOLISME_CLIENT = '$tmb' WHERE ID_CLIENT = '$_SESSION[id]'";
$_SESSION['metabolisme'] = $tmb;
if ($mysqli->query($sql) === TRUE) {
    echo "El metabolismo se ha guardado correctamente en la base de datos.";
} else {
    echo "Error al guardar el metabolismo en la base de datos: " . $mysqli->error;
}


$mysqli->close();
?>
