<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header("Location: ../Login-Register/login.php");
    exit(); 
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f1ef007bcc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../estils/estilo.css">
    <link rel="stylesheet" href="../../estils/styleInterface.css">
    <title>AE_Performance</title>
</head>
<body>
    <div class="contenedor-header">
        <header>
            <img id="logo" src="../../img/logo.png" alt="logo">
            <nav id="nav">
    <?php
    if(isset($_SESSION['id'])) {
        echo '<a href="../../index.php" onclick="seleccionar()">Inicio</a>';
        echo '<a href="../Serveis/serveis.php" onclick="seleccionar()">Servicios</a>';
        echo '<a href="../../php/logout.php">Cerrar sesión</a>'; 
    } else {
        echo '<a href="../../index.php" onclick="seleccionar()">Inicio</a>';
        echo '<a href="../Login-Register/login.php" onclick="seleccionar()">Login</a>';
        echo '<a href="../Serveis/serveis.php" onclick="seleccionar()">Servicios</a>';
    }
    ?>
</nav>

             

            <div id="icono-nav" class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>                
        </header>
    </div>
    <div class="contenedor-inicio1">

    <div class="contenedor-info2">
    <i class=" d1 fa-solid fa-dumbbell"></i>
    <i class=" d2 fa-solid fa-dumbbell"></i>
    <i class=" d3 fa-solid fa-dumbbell"></i>
    <?php
    if (isset($_SESSION['username'])) {
        echo '<h2>HOLA, ' . $_SESSION['username'] . '</h2>';
    } else {
        echo '<h2>HOLA, Usuario</h2>'; 
    }
    ?>
    <i id="scrollButton" class="arrow fa-solid fa-chevron-down"></i>
</div>
        <div class="contenedor-info">

<div class="user_interface">
    <?php
     if(!$_SESSION['nom_inscr']){
        echo '<div id="pantalla-bloqueo"><i class="fa-solid fa-lock"></i></div>';
     }
    ?>
<aside>
    <div id="inici" class="aside-option">Inici</div>
    <div id="calcularKcal" class="aside-option">Calculadora kcal</div>
    <div id="Menjars" class="aside-option">Afegir Menjar</div>
    <div  id="menjarsTaula"class="aside-option">Tots els Menjars</div>
    <div id="afegir_Ingesta" class="aside-option">afegir Ingesta</div>
</aside>
<div id="user_interface_container" class="user_interface_container">
<div class="dades-usuari">
<h3 style='text-align: center;'>Dades personals</h3>

    <p><b>Nom Usuari:</b> <?php echo $_SESSION['username']; ?></p>
    <p><b>Cognoms:</b> <?php echo $_SESSION['cognoms']; ?></p>
    <p><b>Direcció:</b> <?php echo $_SESSION['direccio']; ?></p>
    <p><b>Telefon:</b> <?php echo $_SESSION['telefon']; ?></p>
    <p><b>Data de naixement</b> <?php echo $_SESSION['data']; ?></p>
    <p><b>Altura:</b> <?php echo $_SESSION['altura']; ?></p>
    <p><b>Pes:</b> <?php echo $_SESSION['pes']; ?></p>
    <p><b>Metabolisme:</b> <?php echo $_SESSION['metabolisme']; ?></p>
    <p><b>Inscripcio:</b> <?php echo $_SESSION['nom_inscr']; ?></p>
</div>

      </div>
</div>
</div>

        </div>
 
    </div>
    

    <script src="../../scripts/app.js"></script>
    <script src="../../scripts/user_interface.js"></script>
    <script>
        menjarsTaula.addEventListener("click", () =>{
 
 container.innerHTML =`<table style='border-collapse: collapse; width: 80%;'>
 <tr style='background-color: #0056b3; '>
 <th style='border: 1px solid; color: white; padding: 8px;'>Nom del menjar</th>
     <th style='border: 1px solid; color: white; padding: 8px;'>Carbohidratos</th>
     <th style='border: 1px solid; color: white; padding: 8px;'>Proteínas</th>
     <th style='border: 1px solid; color: white; padding: 8px;'>Grasas</th>
     
 </tr>
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

 

 $resultat = mysqli_query($mysql, "SELECT * FROM menjars");
 while ($fila = mysqli_fetch_assoc($resultat)) {
     echo "<tr>";
     echo "<td style='border: 1px solid; padding: 8px;'>" . $fila["NOM_MENJAR"] . "</td>";
     echo "<td style='border: 1px solid; padding: 8px;'>" . $fila["CARBOHIDRATS"] . "</td>";
     echo "<td style='border: 1px solid; padding: 8px;'>" . $fila["PROTEINES"] . "</td>";
     echo "<td style='border: 1px solid; padding: 8px;'>" . $fila["GRASES"] . "</td>";
     echo "</tr>";
 }

 ?>
</table>
`
})


    </script>
    <script>
        afegirIngesta.addEventListener("click", () =>{
    container.innerHTML = `
    <div class='ingestes'>
    <?php


$fechaActual = date("Y-m-d");
$cliente_id = $_SESSION["id"];
$consultaPlanesHoy = $mysql->query("SELECT * FROM plans WHERE DATE(DATA_INGESTA) = '$fechaActual' AND ID_CLIENT = '$cliente_id'");


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
echo "Total de Calories: <b>" . $totalCalorias . "kcal / " . $_SESSION['metabolisme'] . "kcal</b>";
if($totalCalorias > $_SESSION["metabolisme"]){
    echo "<span ><b style='color: red'> <---!!!</span> </b><br>";
}
else{
    echo "<br>";
}
echo "Total de Carbohidrats: <b>" . $totalCarbohidratos . "g</b><br>";
echo "Total de Proteines: <b>" . $totalProteinas . "g</b><br>";
echo "Total de Grases: <b>" . $totalGrasas . "g</b><br>";
?>

    <form id="formPlan" action="../../php/guardarPlan.php" method="post">
<div class="form-group">
    <label for="nombreComida">Nombre de la comida:</label>
    <select id="nombreComida" name="nombreComida" required>
        <?php
        
        $consultaComida = $mysql->query("SELECT NOM_MENJAR FROM menjars");

        
        while ($filaComida = $consultaComida->fetch_assoc()) {
            $nombreComida = $filaComida['NOM_MENJAR'];
            echo "<option value='$nombreComida'>$nombreComida</option>";
        }
        mysqli_close($mysql);
        ?>
    </select>
    <label for="Cantiadad">Cantitat (g):</label>
    <input type="text" name="Cantitat" required>
</div>

<div class="form-group" style="display: none;">
    <label for="idUsuario">ID de usuario:</label>
    <input type="text" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['id']; ?>" readonly>
</div>
<div class="form-group" style="display: none;">
    <label for="fecha">Fecha:</label>
    <input type="text" id="fecha" name="fecha" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
</div>
<button type="submit">Guardar Plan</button>
</form>
</div>

`
var borrar = document.getElementsByClassName("fa-trash")

for (var i = 0 ; i < borrar.length; i++) {
    borrar[i].addEventListener('click' , (e) =>{
        e.target.parentNode.remove();
        console.log(e.target.parentNode.id)
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../../php/borrarElement.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                
            }
        };
        xhr.send(`id_element=${e.target.parentNode.id}`);
        
    }); 
 }
})


    </script>
</body>


</html>
