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


$id = intval($_GET['id']);  


$query = "SELECT * FROM clients WHERE ID_CLIENT = $id";
$resultat = mysqli_query($mysql, $query);

if ($resultat) {
    $fila = mysqli_fetch_assoc($resultat);
    if ($fila) {
        
        $queryInscr = "SELECT * FROM inscripcions WHERE CLIENT = '$id'";
        $resultInscr = mysqli_query($mysql, $queryInscr);
        $inscr = mysqli_fetch_assoc($resultInscr);

        $tarifaId = $inscr['TARIFA_CONTRACTADA'];
        $queryTarifa = "SELECT * FROM tarifes WHERE ID_TARIFA = '$tarifaId'";
        $resultTarifa = mysqli_query($mysql, $queryTarifa);
        $tarifa = mysqli_fetch_assoc($resultTarifa);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Usuario</title>
    <link rel="stylesheet" href="../../estils/user-details.css">
    
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
</head>
<body>
    <div class="contenedor">
        <h2>Detalles del Cliente</h2>
        <p><b>ID:</b> <?php echo $fila["ID_CLIENT"]; ?></p>
        <p><b>Nombre:</b> <?php echo $fila["NOM_CLIENT"]; ?></p>
        <p><b>Apellidos:</b> <?php echo $fila["COGNOMS"]; ?></p>
        <p><b>Dirección:</b> <?php echo $fila["DIRECCIO"]; ?></p>
        <p><b>Teléfono:</b> <?php echo $fila["TELEFON"]; ?></p>
        <p><b>Fecha de Nacimiento:</b> <?php echo $fila["DATA_NAIXEMENT"]; ?></p>
        <p><b>Altura:</b> <?php echo $fila["ALTURA"]; ?> cm</p>
        <p><b>Peso:</b> <?php echo $fila["PES"]; ?> kg</p>
        <p><b>Metabolismo:</b> <?php echo $fila["METABOLISME_CLIENT"]; ?> kcal</p>
        <h3>Detalles de la Inscripción</h3>
        <p><b>Inscripción:</b> <?php echo $tarifa["NOM_TARIFA"]; ?></p>
        <p><b>Descripción:</b> <?php echo $tarifa["DESCRIPCIO"]; ?></p>
        
        <div id='calendar'></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dateClick: function(info) {
                    
                    window.location.href = "veure_ingestes.php?fecha=" + info.dateStr + "&id=" + <?php echo $id ?>+ "&meta=" + <?php echo $fila["METABOLISME_CLIENT"]; ?>;
                    window.location.style.background = "red"
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>
<?php
    } else {
        echo '<p>No se encontró el cliente con ID ' . $id . '</p>';
    }
    mysqli_free_result($resultat);
} else {
    echo '<p>Error al obtener el cliente: ' . mysqli_error($mysql) . '</p>';
}

mysqli_close($mysql);
?>
