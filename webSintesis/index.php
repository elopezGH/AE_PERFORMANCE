


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f1ef007bcc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estils/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>AE_Performance</title>
</head>
<body>
    <div class="contenedor-header">
        <header>
            <img id="logo" src="img/logo.png" alt="logo">
            <nav id="nav">
          <?php  if(isset($_SESSION['id'])) {
        // Opcions que es mostren quan s'ha iniciat sessió
        echo '<a href="index.php" onclick="seleccionar()">Inicio</a>';
        echo '<a href="./views/user_interface/user_interface.php" onclick="seleccionar()">Interfaz de Usuario</a>';
        echo '<a href="./views/Serveis/serveis.php" onclick="seleccionar()">Servicios</a>';
        echo '<a href="./php/logout.php">Cerrar sesión</a>'; 
    } else {
         // Opcions que es mostren si NO s'ha iniciat sessió
        echo '<a href="index.html" onclick="seleccionar()">Inicio</a>';
        echo '<a href="./views/Login-Register/login.php" onclick="seleccionar()">Login</a>';
        echo '<a href="./views/Login-Register/Register.php" onclick="seleccionar()">Register</a>';
        echo '<a href="./views/Serveis/serveis.php" onclick="seleccionar()">Servicios</a>';
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
            
            
            <h2>
            AE_PERFORMANCE
            <div class="line"></div>    
            ACONSEGUEIX ELS TEUS OBJECTIUS AMB NOSALTRES</h2>
            <i id="scrollButton" class="arrow fa-solid fa-chevron-down"></i>
            </div>
        
                
        <!-- Carrusel de Fotografies amb Fons Negre -->
        <div style='background: #1891c8' class="carousel-container">
            <div id="photoCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/GIM1.webp" class="d-block w-100" alt="Photo 1">
                    </div>
                    <div class="carousel-item">
                        <img src="img/GIM2.png" class="d-block w-100" alt="Photo 2">
                    </div>
                    <div class="carousel-item">
                        <img src="img/GIM3.webp" class="d-block w-100" alt="Photo 3">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#photoCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#photoCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
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
 
    </div>
    
    <style>
        .carousel-inner img {
            max-width: 100%;
            height: auto;
        }
        .carousel-container {
        background-color: black;
        padding: 40px 0; 
        text-align: center; 
        }   

        .carousel-inner img {
            max-width: 70%; 
            height: auto; 
            margin: 0 auto;
        }
    </style>
    <script src="./scripts/app.js"></script>
</body>
</html>

