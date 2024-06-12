<?php

session_start();

$conn = mysqli_connect('127.0.0.1', 'root', '', 'ae_performance');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM clients WHERE NOM_CLIENT='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_client = $row['ID_CLIENT'];
    $_SESSION['id'] = $row['ID_CLIENT'];
    $_SESSION['username'] = $row['NOM_CLIENT'];
    $_SESSION['cognoms'] = $row['COGNOMS'];
    $_SESSION['direccio'] = $row['DIRECCIO'];
    $_SESSION['telefon'] = $row['TELEFON'];
    $_SESSION['data'] = $row['DATA_NAIXEMENT'];
    $_SESSION['altura'] = $row['ALTURA'];
    $_SESSION['pes'] = $row['PES'];
    $_SESSION['metabolisme'] = $row['METABOLISME_CLIENT'];
    $sql = "SELECT * FROM inscripcions WHERE CLIENT = '$id_client'";
    $result1 = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result1);
    $inscripcio = $row1['TARIFA_CONTRACTADA'];
    $sql = "SELECT * FROM tarifes WHERE ID_TARIFA = '$inscripcio'";
    $result2 = mysqli_query($conn, $sql);
    $row2= mysqli_fetch_assoc($result2);
    $_SESSION['nom_inscr'] = $row2['NOM_TARIFA'];
    $_SESSION['descripcio_inscr'] = $row2['DESCRIPCIO'];
    $_SESSION['preu_inscr'] = $row2['PREU'];
    if($row['NOM_CLIENT'] == 'admin'){
        header("Location: ../views/user_interface/admin_interface.php");
    }    
    else{header("Location: ../views/user_interface/user_interface.php");}
    exit();
} else {
    $_SESSION['error_message'] = "<p class='error-message'>Usuari o contrasenya incorrecte</p>";
    header("Location: ../views/Login-Register/login.php");
}
