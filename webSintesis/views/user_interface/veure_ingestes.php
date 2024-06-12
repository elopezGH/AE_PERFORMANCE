<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header("Location: ../Login-Register/login.php");
    exit();
}


if (!isset($_GET['id'])) {
    echo "ID de usuario no especificado.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../estils/veure-ingestes.css">
</head>
<body>
<?php

$host = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'ae_performance';

$mysql = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('Error al conectar con la base de datos: ' . mysqli_connect_error());
}

mysqli_set_charset($mysql, 'utf8mb4');
if (mysqli_errno($mysql)) {
    die('Error de mysqli: ' . mysqli_error($mysql));
}

$fechaActual = $_GET['fecha']; 
$meta = $_GET['meta']; 
$id = intval($_GET['id']);

$consultaPlanesHoy = $mysql->query("SELECT * FROM plans WHERE DATE(DATA_INGESTA) = '$fechaActual' AND ID_CLIENT = '$id'");

$totalCalorias = 0;
$totalCarbohidratos = 0;
$totalProteinas = 0;
$totalGrasas = 0;


echo "<h2>Ingestes d'avui ($fechaActual)</h2>";
echo "<ul>";
while ($filaPlanHoy = $consultaPlanesHoy->fetch_assoc()) {
    
    $idMenjar = $filaPlanHoy['ID_MENJAR'];

    $consultaMenjar = $mysql->query("SELECT * FROM menjars WHERE ID_MENJAR = '$idMenjar'");
    $filaMenjar = $consultaMenjar->fetch_assoc();
    $nombreComida = $filaMenjar['NOM_MENJAR'];
    $caloriasPor100g = $filaMenjar['Calorias'];
    $carbohidratosPor100g = $filaMenjar['CARBOHIDRATS'];
    $proteinasPor100g = $filaMenjar['PROTEINES'];
    $grasasPor100g = $filaMenjar['GRASES'];
    $cantidad = $filaPlanHoy['CANTITAT'];
    $idPla = $filaPlanHoy['ID_PLA'];

    
    $calorias = $caloriasPor100g * ($cantidad / 100);
    $carbohidratos = $carbohidratosPor100g * ($cantidad / 100);
    $proteinas = $proteinasPor100g * ($cantidad / 100);
    $grasas = $grasasPor100g * ($cantidad / 100);

    $totalCalorias += $calorias;
    $totalCarbohidratos += $carbohidratos;
    $totalProteinas += $proteinas;
    $totalGrasas += $grasas;


    echo "<li id='" . $idPla . "' class='foodList'>";
    echo "Nombre Menjar: <b>" . $nombreComida . "</b>, ";
    echo "Cantitat: <b>" . $cantidad . "g </b>, ";
    echo "Kcal: <b>" . $calorias . ", </b>";
    echo "Carbohidrats: <b>" . $carbohidratos . "g </b>, ";
    echo "Proteines: <b>" . $proteinas . "g </b>, ";
    echo "Grases: <b>" . $grasas . "g </b>";
    echo "<i class='fa-solid fa-trash'></i>";
    echo "</li> ";
    
}
echo "</ul>";


echo "<h2>Macronutrients</h2>";
echo "Total de Calories: <b>" . $totalCalorias . "kcal / " . $meta . "kcal</b>";
if($totalCalorias > $meta){
    echo "<span ><b style='color: red'> <---!!!</span> </b><br>";
}
else{
    echo "<br>";
}
echo "Total de Carbohidrats: <b>" . $totalCarbohidratos . "g</b><br>";
echo "Total de Proteines: <b>" . $totalProteinas . "g</b><br>";
echo "Total de Grases: <b>" . $totalGrasas . "g</b><br>";
?>
</body>
</html>