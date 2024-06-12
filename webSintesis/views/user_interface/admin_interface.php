<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id']) || $_SESSION['id'] != 18) {
    header("Location: ../Login-Register/login.php");
    exit();
}

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




?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../../estils/estilo.css">
</head>
<body>
    <div class="admin-container">
        <?php
        $host = '127.0.0.1';
        $username = 'root';
        $password = '';
        $dbname = 'ae_performance';

        $mysql = mysqli_connect($host, $username, $password, $dbname);

        if (!$mysql) {
            die('Error al conectar con la base de datos: ' . mysqli_connect_error());
        }

        mysqli_set_charset($mysql, 'utf8mb4');
        if (mysqli_errno($mysql)) {
            die('Error de mysqli: ' . mysqli_error($mysql));
        }

        $resultat = mysqli_query($mysql, "SELECT * FROM clients");
        if ($resultat) {
            while ($fila = mysqli_fetch_assoc($resultat)) {
                echo '<div id="' . $fila["ID_CLIENT"] . '" class="user-info">';
                echo '<h3>Nombre: ' . $fila["NOM_CLIENT"] . '</h3>';
                echo '<p><a class="button" href="admin-user-interface.php?id=' . $fila["ID_CLIENT"] . '" class="button_admin">Ver Ficha</a></p>';
                echo '</div>';
            }
            mysqli_free_result($resultat);
        } else {
            echo '<p>Error al obtener los clientes: ' . mysqli_error($mysql) . '</p>';
        }

        mysqli_close($mysql);
        ?>
    </div>
    <script src="../../scripts/admin-interface.js"></script>
</body>
</html>
