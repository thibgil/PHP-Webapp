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
    <link rel='stylesheet' type='text/css' media='screen' href='OversightTeam.css'>
    <link rel="icon" type="image/png" href="../img/factorypng.png">
    <script src='OversightTeam.js'></script>
</head>
<body>
    
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- En-tête de page -->

    <header class="header">

        <nav class="menuNav">

            <div class="leftSide">
                <img src="../../img/logoIM.png" alt="logoIM" class="logoIM">

                <p class="slogan">
                    L'INDUSTRIE 2.0
                </p>

                <form action="../../Config/languages.includes.php" method="post">
                    <select name='language' id="language" onchange='this.form.submit()'>
                        <option value="FR">FR</option>
                        <option value="EN">EN</option>
                    </select>
                    <input type="hidden" name="URL" id="URL" value="About/OversightTeam/OversightTeam.php">
                    <input type="hidden" name="formsend" value="submit">
                </form>
            </div>

            <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
            <!-- Menu de navigation -->

            <ul class="nav-links">
                <li class="button">
                    <a href="../../index.php">
                        Accueil
                    </a>
                    
                </li>

                <li class="button">
                    <a href="../../Solution/Solution.php">
                        Solution
                    </a>
                    
                </li>

                <li class="button">
                    <a href="../../About/About.php">
                        A propos
                    </a>
                    
                </li>

                <li class="button">
                    <a href="../../Contact/Contact.php">
                        Contact
                    </a>
                    
                </li>


                <?php
                
                    if(isset($_SESSION["email"])){
                        echo "<li class='button'><a href='../../Dashboard/Dashboard.php'>Dashboard</a></li>";

                        $bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'root', '');
                        $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
                        $recupUser->execute(array($_SESSION['email']));
                        $isAdmin = $recupUser->fetch()['isAdmin'];

                        if($isAdmin == 1){
                            echo "<li class='button'><a href='../../AdminPanel/adminPanel.php'>Administration</a></li>";
                        }

                        echo "<li class='button'><a href='../../Home/php.scripts/logout.php'>Déconnexion</a></li>";
                    }
                    else{
                        //<img src="../img/connexionLogo.png" alt="connexionLogo" height="50" width="50" class="connexionLogo">
                        echo "<li class='button'><a href='../../Log/log.php'>Connexion</a></li>";
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
    <div class="OversightTeamContainer">
        <div class="containerTitle">
            <h1>Découvrez l'équipe Oversight</h1>
        </div>

        <div class="members">
            <div class="first">
                <div class="person">
                    <img src="../../img/Thibault.png" class="imgThibault"></img>
                    <h4 class="ThibaultName">Thibault Gilbin</h4>
                    <h4 class="ThibaultFunction">Co-fondateur, Ingénieur Logiciel, Back-End</h4>
                </div>

                <div class="person">
                    <img src="../../img/Lucas.png" class="imgLucas"></img>
                    <h4 class="LucasName">Lucas Chevalier</h4>
                    <h4 class="LucasFunction">Co-fondateur, Ingénieur Logiciel, Front-End</h4>
                </div>

                <div class="person">
                    <img src="../../img/Clemence.png" class="imgClemence"></img>
                    <h4 class="ClemenceName">Clémence Canguilhem</h4>
                    <h4 class="ClemenceFunction">Ingénieur Electronique</h4>
                </div>
            </div>
            
            <div class="second">
                <div class="person">
                    <img src="../../img/Noelle.png" class="imgNoelle"></img>
                    <h4 class="NoelleName">Noelle Garreta</h4>
                    <h4 class="NoelleFunction">Ingénieur Electronique</h4>
                </div>

                <div class="person">
                    <img src="../../img/Amin.png" class="imgAmin"></img>
                    <h4 class="AminName">Amin El Kadari</h4>
                    <h4 class="AminFunction">Ingénieur Télécommunications</h4>
                </div>

                <div class="person">
                    <img src="../../img/Anthony.png" class="imgAnthony"></img>
                    <h4 class="AnthonyName">Anthony Villemain</h4>
                    <h4 class="AnthonyFunction">Ingénieur Traitement du Signal</h4>
                </div>
            </div>

        </div>
    </div> 


    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- Pied de page -->
    <footer class="footer">
        <ul>
            <li class="link">
                <a href="../../LegalTerms/LegalTerms.php">CGU</a>
            </li>
        </ul>


        <div class="poweredByOversight">
            <p class="poweredBy">Développé par <a href="" class="oversight"  style='text-decoration:underline'>Oversight</a></p>
        </div>
    </footer>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    
</body>
</html>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>