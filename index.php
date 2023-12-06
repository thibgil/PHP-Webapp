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
    <link rel='stylesheet' type='text/css' media='screen' href='EN_VERSION/home.css'>
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
                <img src="EN_VERSION/img/logoIM.png" alt="logoIM" class="logoIM">

                <p class="slogan">
                    THE NEW INDUSTRY
                </p>

                <form action="EN_VERSION/Config/languages.includes.php" method="post">
                    <select name='language' id="language" onchange='this.form.submit()'>
                        <option value="EN">EN</option>
                        <option value="FR">FR</option>
                    </select>
                    <input type="hidden" name="URL" id="URL" value="index.php">
                    <input type="hidden" name="formsend" value="submit">
                </form>
            </div>

            <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
            <!-- Menu de navigation -->

            <ul class="nav-links">
                <li class="button" style='text-decoration:underline'>
                    <a href="index.php">
                        Home
                    </a>
                    
                </li>
                
                <li class="button">
                    <a href="EN_VERSION/Solution/Solution.php">
                        Solution
                    </a>
                    
                </li>

                <li class="button">
                    <a href="EN_VERSION/About/About.php">
                        About
                    </a>
                    
                </li>

                <li class="button">
                    <a href="EN_VERSION/Contact/Contact.php">
                        Contact
                    </a>
                    
                </li>

                <?php
                
                    if(isset($_SESSION["email"])){
                        echo "<li class='button'><a href='EN_VERSION/Dashboard/Dashboard.php'>Dashboard</a></li>";

                        $bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'root', '');
                        $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
                        $recupUser->execute(array($_SESSION['email']));
                        $isAdmin = $recupUser->fetch()['isAdmin'];

                        if($isAdmin == 1){
                            echo "<li class='button'><a href='EN_VERSION/AdminPanel/adminPanel.php'>Admin-Panel</a></li>";
                        }

                        echo "<li class='button'><a href='EN_VERSION/Log/php.scripts/logout.php'>Log out</a></li>";
                    }
                    else{
                        //<img src="EN_VERSION/img/connexionLogo.png" alt="connexionLogo" height="50" width="50" class="connexionLogo">
                        echo "<li class='button'><a href='EN_VERSION/Log/log.php'>Log in</a></li>";
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
            <h4>Welcome, we are</h4>
            <h1>Infinite <span style="color:#74b2dc">Measures.</span></h1>
            <h3>We provide some technological solutions in the field of Industry.</h3>
            <div class="pra">
                <p style="text-align: center;">
                    <a class="letStart" href="EN_VERSION/Log/log.php">Let's get started</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Bottom = Services -->
    <div class="service">
        <div class="title">
            <h2>Our Services</h2>
        </div>

        <div class="box">
            <div class="card">
                <i class="fas fa-bars"></i>
                <h5>Our Field</h5>
                <div class="pra">
                    <p>We deploy environmental measurement technologies to help industries modernize and be greener. We produce connected sensors that can be worn by factory workers.</p>
                    <br>
                    <a class="bottomButtons" href="EN_VERSION/Solution/solution.php">Learn more</a>
                </div>
            </div>

            <div class="card">
                <i class="far fa-user"></i>
                <h5>Personalization</h5>
                <div class="pra">
                    <p>We offer a web platform that allows users to personalize their experience. A factory can connect its workers and analyze their data in a specific way.</p>
                    <br>
                    <a class="bottomButtons" href="EN_VERSION/About/About.php">About us</a>
                </div>
            </div>

            <div class="card">
                <i class="far fa-bell"></i>
                <h5>Communication</h5>
                <div class="pra">
                    <p>We have developed a platform for our customers to communicate with us. Our administrators can help you with any issues with your devices. You can even contact us without connecting.</p>
                    <br>
                    <a class="bottomButtons" href="EN_VERSION/Contact/Contact.php">Contact us</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- Pied de page -->

    <footer class="footer">
        <ul>
            <li class="link">
                <a href="EN_VERSION/LegalTerms/LegalTerms.php">Legal Terms</a>
            </li>
        </ul>

        <div class="poweredByOversight">
            <p class="poweredBy">Powered by <a href="EN_VERSION/About/OversightTeam/OversightTeam.php" class="oversight">Oversight</a></p>
        </div>
    </footer>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    
</body>
</html>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
