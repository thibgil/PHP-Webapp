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
    <link rel='stylesheet' type='text/css' media='screen' href='Solution.css'>
    <link rel="icon" type="image/png" href="../img/factorypng.png">
    <script src='Solution.js'></script>
</head>
<body>
    
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- En-tête de page -->

    <header class="header">

        <nav class="menuNav">

            <div class="leftSide">
                <img src="../img/logoIM.png" alt="logoIM" class="logoIM">

                <p class="slogan">
                    L'INDUSTRIE 2.0
                </p>

                <form action="../Config/languages.includes.php" method="post">
                    <select name='language' id="language" onchange='this.form.submit()'>
                        <option value="FR">FR</option>
                        <option value="EN">EN</option>
                    </select>
                    <input type="hidden" name="URL" id="URL" value="Solution/Solution.php">
                    <input type="hidden" name="formsend" value="submit">
                </form>
            </div>

            <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
            <!-- Menu de navigation -->

            <ul class="nav-links">
                <li class="button">
                    <a href="../index.php">
                        Accueil
                    </a>
                    
                </li>
                
                <li class="button">
                    <a href="../Solution/Solution.php" style='text-decoration:underline'>
                        Solution
                    </a>
                    
                </li>

                <li class="button">
                    <a href="../About/About.php">
                        A propos
                    </a>
                    
                </li>

                <li class="button">
                    <a href="../Contact/Contact.php">
                        Contact
                    </a>
                    
                </li>

                <?php
                
                    if(isset($_SESSION["email"])){
                        echo "<li class='button'><a href='../Dashboard/Dashboard.php'>Dashboard</a></li>";

                        $bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'root', '');
                        $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
                        $recupUser->execute(array($_SESSION['email']));
                        $isAdmin = $recupUser->fetch()['isAdmin'];

                        if($isAdmin == 1){
                            echo "<li class='button'><a href='../AdminPanel/adminPanel.php'>Administration</a></li>";
                        }

                        echo "<li class='button'><a href='../Log/php.scripts/logout.php'>Déconnexion</a></li>";
                    }
                    else{
                        //<img src="../img/connexionLogo.png" alt="connexionLogo" height="50" width="50" class="connexionLogo">
                        echo "<li class='button'><a href='../Log/log.php'>Connexion</a></li>";
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

    <div class="solutionPresentation">
        
        <div class="pollutionSensor">
            <br>
            <img class="pollutionImg" src="../img/co2.PNG" alt="pollutionImg">
            <h4 class="pollutionSensorTitle">Capteur de pollution</h4>
            <br>
            <div class="pollutionOverlay">
                <p class="pollutionOverlayText">
                    Les sites industriels sont la deuxième plus grande source de pollution en France. 
                    Il est nécessaire de surveiller la production de gaz néfastes en industrie. 
                    Notre capteur a été développé pour protéger au mieux nos utilisateurs de la qualité de l’air qu’ils respirent.
                </p>
            </div>
        </div>


        <div class="soundSensor">
            <br>
            <img class="soundImg" src="../img/sound.PNG" alt="soundImg">
            <h4 class="soundSensorTitle">SOUND SENSOR</h4>
            <br>

            <div class="soundOverlay">
                <p class="soundOverlayText">
                Le son bruyant, que produisent les sites industriels, peut être nuisible pour les personnes évoluant dans cet environnement de travail.
                Notre capteur sonore permet aux utilisateurs de surveiller la qualité du son et de les prévenir de certaines menaces et de sons nuisibles.
                </p>
            </div>
        </div>

        <div class="heartBeatSensor">
            <br>
            <img class="heartBeatImg" src="../img/heartBeat.png" alt="heartBeatImg">
            <h4 class="heartBeatSensorTitle">HEART BEAT SENSOR</h4>
            <br>

            <div class="heartOverlay">
                <p class="heartOverlayText">
                    Notre capteur cardiaque relève la fréquence cardiaque de nos utilisateurs afin de surveiller leur santé et les risques qui peuvent survenir. 
                    Les efforts fournis dans un environnement défavorable voire dangereux peuvent porter préjudice.
                </p>
            </div>
        </div>

    </div>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- Pied de page -->
    <footer class="footer">
        <ul>
            <li class="link">
                <a href="../LegalTerms/LegalTerms.php">CGU</a>
            </li>
        </ul>


        <div class="poweredByOversight">
            <p class="poweredBy">Développé par <a href="../About/OversightTeam/OversightTeam.php" class="oversight"  style='text-decoration:underline'>Oversight</a></p>
        </div>
    </footer>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    
</body>
</html>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
