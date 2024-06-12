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

$nom_menjar = $_POST['Menjar'];
$carbohidrats = $_POST['Carbohidrats'];
$proteina = $_POST['proteina'];
$grases = $_POST['grases'];
$kcal = $_POST['kcal'];


if (mysqli_query($mysql, "INSERT INTO menjars (nom_menjar, carbohidrats, proteines, grases, Calorias) VALUES ('$nom_menjar', '$carbohidrats', '$proteina', '$grases', '$kcal')") === TRUE) {
    printf("<p> Se ha insertado con éxito un nuevo menjar </p>");
} else {
    printf("<p> ERROR " . mysqli_error($mysql) . " </p>");
}

mysqli_close($mysql);
?>
