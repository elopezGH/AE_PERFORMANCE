<?php
session_start();

$element = $_POST['id_element'];


$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'ae_performance';

$mysqli = new mysqli($host, $username, $password, $dbname);


if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
$sql = "DELETE FROM plans where ID_PLA = '$element'";
if ($mysqli->query($sql) === TRUE) {
    echo "OKS";
} else {
    echo "Error al guardar el metabolismo en la base de datos: " . $mysqli->error;
}



$mysqli->close();
?>