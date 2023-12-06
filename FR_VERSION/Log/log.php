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
    <link rel='stylesheet' type='text/css' media='screen' href='log.css'>
    <link rel="icon" type="image/png" href="img/factorypng.png">
    <script src='log.js'></script>
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
                    <input type="hidden" name="URL" id="URL" value="Log/log.php">
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
                    <a href="../Solution/Solution.php">
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

                <li class="button">
                    <a href="log.php" style='text-decoration:underline'>
                        Connexion
                    </a>
                </li>

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

    <div class="homeLoginPreview">
        
        <div class="homeLoginFormContainer">
            <div class="homeLoginFormTitle">
                <h2>CONNEXION ✔️</h2>
            </div>
            
            <form action="php.scripts/login.php" method="post" class="homeLoginForm">
                <div class="emailInput">
                    <div>
                        <label for="email">Email 📫</label>
                    </div>

                    <div class="email">
                        <input type="text" name="email" id="email" required size="40px" autocomplete="off">
                    </div>
                </div>
                
                <div class="passwordInput">
                    <div>
                        <label for="password">Mot de passe 🔒</label>
                    </div>
                    
                    <div class="password">
                        <input type="password" name="password" id="password" required size="40px" autocomplete="off">
                    </div>
                </div>

                <div class="loginBtn">
                    <button type="submit" name="submit" id="submit">Connexion</button>
                </div>
            </form>

            <?php 
                //gestion des erreurs en GET
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                        echo "<h1>You missed a blank, fill the other !</h1>";
                    }
                    else if($_GET["error"] == "wronglogin"){
                        echo "<h1>Incorrect login information !</h1>";
                    }
                    else if($_GET["error"] == "notaccepted"){
                        echo "<h1>You haven't been accepted to join yet. Wait for an Administrator answer.</h1>";
                    }
                }

            ?>

            <hr class="loginFormLineSeparator">

            <div class="notRegText">
                <p>Pas encore inscris ? ⏱</p>
            </div>
            
            <div class="registerBtn">
                <form method="get" action="../Register/Register.php">
                    <button type="submit">S'inscrire</button>
                </form>    
            </div>
        </div>

        <div class="homePreviewContainer">
            <div class="homePreviewContainerTitle">
                <h2>Ce que vous verrez sur votre espace personnel 📷</h2>
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
