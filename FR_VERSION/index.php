<!-- Initialisation -->

<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Infinite Measures</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='home.css'>
    <link rel="icon" type="image/png" href="img/factorypng.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- En-tête de page -->

    <header class="header">

        <nav class="menuNav">

            <div class="leftSide">
                <img src="img/logoIM.png" alt="logoIM" class="logoIM">

                <p class="slogan">
                    L'INDUSTRIE 2.0
                </p>

                <form action="Config/languages.includes.php" method="post">
                    <select name='language' id="language" onchange='this.form.submit()'>
                        <option value="FR">FR</option>
                        <option value="EN">EN</option>
                    </select>
                    <input type="hidden" name="URL" id="URL" value="../index.php">
                    <input type="hidden" name="formsend" value="submit">
                </form>
            </div>

            <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
            <!-- Menu de navigation -->

            <ul class="nav-links">
                <li class="button" style='text-decoration:underline'>
                    <a href="index.php">
                        Accueil
                    </a>
                    
                </li>
                
                <li class="button">
                    <a href="Solution/Solution.php">
                        Solution
                    </a>
                    
                </li>

                <li class="button">
                    <a href="About/About.php">
                        A propos
                    </a>
                    
                </li>

                <li class="button">
                    <a href="Contact/Contact.php">
                        Contact
                    </a>
                    
                </li>

                <?php
                
                    if(isset($_SESSION["email"])){
                        echo "<li class='button'><a href='Dashboard/Dashboard.php'>Dashboard</a></li>";

                        $bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'root', '');
                        $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
                        $recupUser->execute(array($_SESSION['email']));
                        $isAdmin = $recupUser->fetch()['isAdmin'];

                        if($isAdmin == 1){
                            echo "<li class='button'><a href='AdminPanel/adminPanel.php'>Administration</a></li>";
                        }

                        echo "<li class='button'><a href='Log/php.scripts/logout.php'>Déconnexion</a></li>";
                    }
                    else{
                        //<img src="img/connexionLogo.png" alt="connexionLogo" height="50" width="50" class="connexionLogo">
                        echo "<li class='button'><a href='Log/log.php'>Connexion</a></li>";
                    }
                ?>
            </ul>

            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <script>
                //navbar burger script
                const navSlide = () => {
                    const burger = document.querySelector('.burger');
                    const nav = document.querySelector('.nav-links');
                    const navLinks = document.querySelectorAll('.nav-links li');

                    //Toggle Nav
                    burger.addEventListener('click', () => {
                        nav.classList.toggle('nav-active');
                    });

                    //Animation
                    navLinks.forEach((link, index) => {
                        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 2}s`;
                    });
                    
                }
                navSlide();
            </script>
        </nav>
    </header>
    
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- Contenu -->

    <!-- Top = Gen presentation -->

	<div class="top">
        <div class="content">
            <h4>Bienvenue, nous sommes</h4>
            <h1>Infinite <span style="color:#74b2dc">Measures.</span></h1>
            <h3>Nous proposons des solutions technologiques pour le secteur industriel.</h3>
            <div class="pra">
                <p style="text-align: center;">
                    <a class="letStart" href="Log/log.php">Commençons</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Bottom = Services -->
    <div class="service">
        <div class="title">
            <h2>Nos Services</h2>
        </div>

        <div class="box">
            <div class="card">
                <i class="fas fa-bars"></i>
                <h5>Nos solutions</h5>
                <div class="pra">
                    <p>Nous développons des systèmes de mesures environnementales afin d'accompagner l'industrie dans sa modernisation et sa trasition écologique. Nous produisons des capteurs connectés qui peuvent être utilisés par les travailleurs de l'industrie.</p>
                    <br>
                    <a class="bottomButtons" href="Solution/solution.php">En savoir plus</a>
                </div>
            </div>

            <div class="card">
                <i class="far fa-user"></i>
                <h5>Personnalisation</h5>
                <div class="pra">
                    <p>Nous offrons une plateforme web permettant aux utilisateurs de personnaliser leur expérience. Chaque usine peut connecter ses employés et analyser leurs données à des fins préventives notamment.</p>
                    <br>
                    <a class="bottomButtons" href="About/About.php">A propos</a>
                </div>
            </div>

            <div class="card">
                <i class="far fa-bell"></i>
                <h5>Communication</h5>
                <div class="pra">
                    <p>Notre plateforme web intègre un système de communication simplifié. Les administrateurs peuvent rapidement vous venir en aide. Vous pouvez même nous contacter sans vous connecter !</p>
                    <br>
                    <a class="bottomButtons" href="Contact/Contact.php">Nous contacter</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- Pied de page -->
    <footer class="footer">
        <ul>
            <li class="link">
                <a href="LegalTerms/LegalTerms.php">CGU</a>
            </li>
        </ul>


        <div class="poweredByOversight">
            <p class="poweredBy">Développé par <a href="About/OversightTeam/OversightTeam.php" class="oversight"  style='text-decoration:underline'>Oversight</a></p>
        </div>
    </footer>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    
</body>
</html>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
