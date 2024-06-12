<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari</title>
    <link rel="stylesheet" href="../../estils/estilo.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1, h4 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 14% auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="number"],  input[type="date"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table{
            margin:auto;
        }
        div{
            text-align: center;
            color: #fff;
        }
        footer{
            position: absolute;
            bottom: calc(0px - 224.55px);
        }
        /*footer*/

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .footer {
        background-color: #000000;
        color: white;
        text-align: center;
        height: 224.55px;
        width: 100%;
    }
    .footer .container1 {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .footer .container1 div {
        margin: 10px 0;
    }
    .footer .container1 div a {
        color: white;
        text-decoration: none;
        margin: 0 10px;
    }
    .footer .container1 div a:hover {
        text-decoration: underline;
    }
    .footer .social-icons {
        display: flex;
        justify-content: center;
    }
    .footer .social-icons a {
        margin: 0 10px;
        color: white;
        font-size: 24px;
    }
    .footer .social-icons a:hover {
        color: #ddd;
    }
    .footer .copyright {
        margin-top: 20px;
        font-size: 14px;
    }
    </style>
</head>
<body style="background-color:#1891c8;">
<div class="contenedor-header">
        <header>
            <img id="logo" src="../../img/logo.png" alt="logo">
            <nav>
            <?php
            if(isset($_SESSION['id'])) {
                // Opcions que es mostren quan s'ha iniciat sessió
                echo '<a href="../../index.php" onclick="seleccionar()">Inicio</a>';
                echo '<a href="../user_interface/user_interface.php" onclick="seleccionar()">Interfaz de Usuario</a>';
                echo '<a href="../Serveis/serveis.php" onclick="seleccionar()">Servicios</a>';
                echo '<a href="../../php/logout.php">Cerrar sesión</a>'; 
            } else {
                // Opcions que es mostren si NO s'ha iniciat sessió
                echo '<a href="../../index.php" onclick="seleccionar()">Inicio</a>';
                echo '<a href="login.php" onclick="seleccionar()">Login</a>';
                echo '<a href="#servicios" onclick="seleccionar()">Servicios</a>';
            }
            ?>
             </nav>

            <div id="icono-nav" class="nav-responsive" onclick="mostrarOcultarMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>                
        </header>
    </div>


    <form method='POST' action="../../php/alta.php">
        <input type="text" name='NOM_CLIENT' placeholder="NOM"id="" required>
        <input type="text" placeholder="COGNOMS" name="COGNOMS" id="" required>
        <input type="text" placeholder="DIRECCIO" name="DIRECCIO" id="" required>
        <input type="number" placeholder="TELEFON" name="TELEFON" id="" required>
        <input type="date" placeholder="DATA NAIXEMENT" name="DATA_NAIXEMENT" id="" required>
        <input type="number" placeholder="ALTURA" name="ALTURA" id="" required>
        <input type="number" placeholder="PES" name="PES" id="" required>
        <input type="password" placeholder="CONTRASENYA" name="CONTRASENYA" required>
        <input type="submit" value="Enviar">
    </form>

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

</body>
</html>