<?php
$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'ae_performance';

$mysql = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    throw new RuntimeException('Error al conectar con la base de datos: ' . mysqli_connect_error());
}

mysqli_set_charset($mysql, 'utf8mb4');
if (mysqli_errno($mysql)) {
    throw new RuntimeException('Error de mysqli: ' . mysqli_error($mysql));
}

$nom_client = $_POST['NOM_CLIENT'];
$cognoms = $_POST['COGNOMS'];
$direccio = $_POST['DIRECCIO'];
$telefon = $_POST['TELEFON'];
$data_naixement = $_POST['DATA_NAIXEMENT'];
$altura = $_POST['ALTURA'];
$pes = $_POST['PES'];
$PASSWORD = $_POST['CONTRASENYA'];



if (mysqli_query($mysql, "INSERT INTO clients (nom_client, cognoms, direccio, telefon, data_naixement, altura, pes, password) VALUES ('$nom_client', '$cognoms', '$direccio', '$telefon', '$data_naixement', '$altura', '$pes', '$PASSWORD')") === TRUE) {

	header('Location: ../views/Login-Register/login.php');
	exit();
} else {
    printf("<p> ERROR " . mysqli_error($mysql) . " </p>");
}


mysqli_close($mysql);
?>