
<?php
// Iniciar la sesión
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/f1ef007bcc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../estils/estilo.css">
</head>
<body>
<div class="contenedor-header">
        <header>
            <img id="logo" src="../../img/logo.png" alt="logo">
            <nav>
            <?php
            if(isset($_SESSION['id'])) {
                // Opcions que es mostren quan s'ha iniciat sessió
                echo '<a href="../../index.php" onclick="seleccionar()">Inicio</a>';
                echo '<a href="../user_interface/user_interface.php" onclick="seleccionar()">Interfaz de Usuario</a>';
                echo '<a href="./" onclick="seleccionar()">Serveis</a>';
                echo '<a href="../../php/logout.php">Cerrar sesión</a>'; 
            } else {
                // Opcions que es mostren si NO s'ha iniciat sessió
                echo '<a href="../../index.php" onclick="seleccionar()">Inicio</a>';
                echo '<a href="../Login-Register/register.php" onclick="seleccionar()">Register</a>';
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
    <div class="contenedor-inicio bg">
    <h2 class='serveis-title'>
SERVEIS QUE OFERIM:
</h2>
    <div class="services-container">

    <div class="service">
      <h2>Estandard</h2>
      <p class="price">$50.00</p>
      <p>Tarifa que inclou, dieta i entreno personalitzats</p>
      <button id="1" class="btn">Contratar</button>
    </div>
    <div class="service">
      <h2>Premium</h2>
      <p class="price">$75.00</p>
      <p>Tarifa que inclou, dieta i 1 entreno presencial</p>
      <button id="2" class="btn">Contratar</button>
    </div>
    <div class="service">
      <h2>Premium Plus</h2>
      <p class="price">$90.00</p>
      <p>Tarifa que inclou, dieta i 3 entreno presencial</p>
      <button id="3" class="btn">Contratar</button>
    </div>
    <div class="service">
      <h2>Premium Màxim Plus</h2>
      <p class="price">$125.00</p>
      <p>Tarifa que inclou, dieta i entrenos presencials il·limitats</p>
      <button id="4" class="btn">Contratar</button>
    </div>
  </div>
    </div>

    <footer class="footer">
        <div class="container1">
            <div class="contact-info">
                <p><strong>Contactes:</strong> agarcia25@milaifontanals.org | elopez6@milaifontanals.org | Tel: 699 081 652 | Tel: 621 217 518</p>
            </div>
            <div class="nav-links">
                <a href="#home">Inici</a>
                <a href="#about">Sobre Nosaltres</a>
                <a href="#services">Serveis</a>
                <a href="#contact">Contacte</a>
            </div>
            <div class="social-icons">
                <a href="https://www.facebook.com" target="_blank" aria-label="Facebook">FB</a>
                <a href="https://www.twitter.com" target="_blank" aria-label="Twitter">TW</a>
                <a href="https://www.instagram.com" target="_blank" aria-label="Instagram">IG</a>
                <a href="https://www.linkedin.com" target="_blank" aria-label="LinkedIn">LN</a>
                <a href="https://www.youtube.com" target="_blank" aria-label="Youtube">YT</a>
            </div>
            <div class="copyright">
                <p>&copy; 2024 AE Performance. Tots els drets reservats.</p>
            </div>
        </div>
    </footer>
    <style>
        footer{
            position: absolute;
            bottom: calc(0px - 224.55px);
        }
    </style>
    <script src="../../scripts/serveis.js"></script>
</body>
</html>