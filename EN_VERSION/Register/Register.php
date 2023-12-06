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
    <link rel='stylesheet' type='text/css' media='screen' href='Register.css'>
    <link rel="icon" type="image/png" href="../img/factorypng.png">
    <script src='Register.js'></script>
</head>
<body>
    
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- En-tête de page -->

    <header class="header">

        <nav class="menuNav">

            <div class="leftSide">
                <img src="../img/logoIM.png" alt="logoIM" class="logoIM">

                <p class="slogan">
                    THE NEW INDUSTRY
                </p>

                <form action="../Config/languages.includes.php" method="post">
                    <select name='language' id="language" onchange='this.form.submit()'>
                        <option value="EN">EN</option>
                        <option value="FR">FR</option>
                    </select>
                    <input type="hidden" name="URL" id="URL" value="Register/Register.php">
                    <input type="hidden" name="formsend" value="submit">
                </form>
            </div>

            <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
            <!-- Menu de navigation -->

            <ul class="nav-links">
                <li class="button">
                    <a href="../../index.php">
                        Home
                    </a>
                    
                </li>

                <li class="button">
                    <a href="../Solution/Solution.php">
                        Solution
                    </a>
                    
                </li>

                <li class="button">
                    <a href="../About/About.php">
                        About
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
                        echo "<li class='button'><a href='../Home/php.scripts/logout.php'>Log out</a></li>";
                    }
                    else{
                        //<img src="../img/connexionLogo.png" alt="connexionLogo" height="50" width="50" class="connexionLogo">
                        echo "<li class='button'><a href='../Log/log.php'>Log in</a></li>";
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
        
    <div class="RegisterFormContainer" id="RegisterFormContainer">
        <div class="RegisterFormTitle">
            <h1 class="title">Register</h1>
        </div>

        <form action="php.scripts/register.include.php" method="post">
            <div class="firstInputZone">
                <div>
                    <label for="pseudo">Pseudo</label>
                </div>
                
                <div class="pseudo">
                    <input type="text" name="pseudo" id="pseudo" oninput="resetStyle(this)" placeholder="Your pseudo...">
                </div>
            </div>

            <div class="inputZone">
                <div>
                    <label for="last_name">Last Name</label>
                </div>

                <div class="last_name">
                    <input type="text" name="last_name" id="last_name" oninput="resetStyle(this)" placeholder="Your last name...">
                </div>
            </div>
            
            <div class="inputZone">
                <div>
                    <label for="first_name">First Name</label>
                </div>
                
                <div class="first_name">
                    <input type="text" name="first_name" id="first_name" oninput="resetStyle(this)" placeholder="Your first name...">
                </div>
            </div>

            <div class="inputZone">
                <div>
                    <label for="email">Email</label>
                </div>
                
                <div class="email">
                    <input type="text" name="email" id="email" oninput="resetStyle(this)" placeholder="Your email...">
                </div>
            </div>

            <div class="inputZone">
                <div>
                    <label for="password">Password</label>
                </div>
                
                <div class="password">
                    <input type="password" name="password" id="password" oninput="passwdStrength(); resetStyle(this)" placeholder="Your password...">
                </div>
                
                <div id="strength-bar" style="width: 240px"></div>
            </div>

            <div class="inputZone">
                <div>
                    <label for="repeatpassword">Repeat Password</label>
                </div>
                
                <div class="repeatpassword">
                    <input type="password" name="repeatpassword" id="repeatpassword" oninput="resetStyle(this)" placeholder="Your password... Once again!">
                </div>
            </div>

            <div class="acceptLegalTerms" id="acceptLegalTerms">
                <input type="checkbox" id="acceptLT" name="acceptLT">
                <label for="acceptLT" id="acceptLTLabel">I certify that I agree to the <a href="../LegalTerms/LegalTerms.php">Terms of Use</a> and <a href="../LegalTerms/LegalTerms.php">Privacy Policy</a>.</label>
            </div>

            <div class="registerBtn">
                <button type="submit" name="formsend" id="formsend">Register</button>
            </div>

            <div class="passwordConditions" id="passwordConditions">
                <p>
                Password must be at least 8 characters long, 
                contain 1 upper case, 1 lower case, 1 number and 1 special character!
                </p>
            </div>

            <div class="stmtFailed" id="stmtFailed">
                <p>
                Something went wrong, please try again!
                </p>
            </div>

        </form>
    </div>

    <div class="bienvenue" id="bienvenue">
        <h3 class="msgDeBienvenue">
            Thank you for your interest!
        </h3>

        <h4>Your subrscription request has been sent successfully, our teams will verify your account within 24h.</h4>
        <h4>If you do not receive further information from us after this time, please feel free to contact us at the following address: help@infinite-measures.com.</h4>
    </div>

    <div>
        <?php
            if(isset($_GET["error"])){

                if(isset($_GET["ps"])){
                    $ps = $_GET["ps"];
                }

                if(isset($_GET["ln"])){
                    $ln = $_GET["ln"];
                }

                if(isset($_GET["fn"])){
                    $fn = $_GET["fn"];
                }

                if(isset($_GET["em"])){
                    $em = $_GET["em"];
                }

                if(isset($_GET["pw"])){
                    $pw = $_GET["pw"];
                }

                if(isset($_GET["rp"])){
                    $rp = $_GET["rp"];
                }

                if(isset($_GET["lt"])){
                    $lt = $_GET["lt"];
                }

                if($_GET["error"] == "emptyinput"){

                    echo "
                        <script type=\"text/javascript\">
                        if('$ps' == ''){
                            document.getElementById('pseudo').style.borderColor = 'red';
                            document.getElementById('pseudo').placeholder = 'Please add a pseudo';
                        }
                        if('$ln' == ''){
                            document.getElementById('last_name').style.borderColor = 'red';
                            document.getElementById('last_name').placeholder = 'Please add your last name';
                        }
                        if('$fn' == ''){
                            document.getElementById('first_name').style.borderColor = 'red';
                            document.getElementById('first_name').placeholder = 'Please add your first name';
                        }
                        if('$em' == ''){
                            document.getElementById('email').style.borderColor = 'red';
                            document.getElementById('email').placeholder = 'Please add your email';
                        }
                        if('$pw' == ''){
                            document.getElementById('password').style.borderColor = 'red';
                            document.getElementById('password').placeholder = 'Please add a password';
                        }
                        if('$rp' == ''){
                            document.getElementById('repeatpassword').style.borderColor = 'red';
                            document.getElementById('repeatpassword').placeholder = 'Please repeat your password';
                        }
                        if('$lt' == ''){
                            document.getElementById('acceptLegalTerms').style.borderRadius = '10px';
                            document.getElementById('acceptLegalTerms').style.boxShadow = '0px 0px 10px red';
                        }

                        document.getElementById('pseudo').value = '$ps';
                        document.getElementById('last_name').value = '$ln';
                        document.getElementById('first_name').value = '$fn';
                        document.getElementById('email').value = '$em';
                        </script>
                    ";
                }
                else if($_GET["error"] == "invalidpseudo"){

                    echo "
                        <script type=\"text/javascript\">
                        document.getElementById('pseudo').style.borderColor = 'red';
                        document.getElementById('pseudo').placeholder = 'Please use only alphanumeric characters';
                        document.getElementById('last_name').value = '$ln';
                        document.getElementById('first_name').value = '$fn';
                        document.getElementById('email').value = '$em';
                        </script>
                    ";
                }
                else if($_GET["error"] == "invalidemail"){

                    echo "
                        <script type=\"text/javascript\">
                        document.getElementById('pseudo').value = '$ps';
                        document.getElementById('last_name').value = '$ln';
                        document.getElementById('first_name').value = '$fn';
                        document.getElementById('email').style.borderColor = 'red';
                        document.getElementById('email').placeholder = 'Your email is invalid';
                        </script>
                    ";
                }
                else if($_GET["error"] == "invalidpasswd"){

                    echo "
                        <script type=\"text/javascript\">
                        document.getElementById('pseudo').value = '$ps';
                        document.getElementById('last_name').value = '$ln';
                        document.getElementById('first_name').value = '$fn';
                        document.getElementById('email').value = '$em';

                        document.getElementById('password').style.borderColor = 'red';
                        document.getElementById('password').placeholder = 'Invalid Password! Check condition below!';
                        document.getElementById('passwordConditions').style.display = 'block';
                        </script>
                    ";
                }
                else if($_GET["error"] == "invalidpasswdmatch"){

                    echo "
                        <script type=\"text/javascript\">
                        document.getElementById('pseudo').value = '$ps';
                        document.getElementById('last_name').value = '$ln';
                        document.getElementById('first_name').value = '$fn';
                        document.getElementById('email').value = '$em';

                        document.getElementById('repeatpassword').style.borderColor = 'red';
                        document.getElementById('repeatpassword').placeholder = 'Passwords do not match, try again!';
                        </script>
                    ";
                }
                else if($_GET["error"] == "ltnotchecked"){

                    echo "
                        <script type=\"text/javascript\">
                        document.getElementById('pseudo').value = '$ps';
                        document.getElementById('last_name').value = '$ln';
                        document.getElementById('first_name').value = '$fn';
                        document.getElementById('email').value = '$em';

                        document.getElementById('acceptLegalTerms').style.borderRadius = '10px';
                        document.getElementById('acceptLegalTerms').style.boxShadow = '0px 0px 10px red';
                        </script>
                    ";

                    echo "<h1></h1>";
                }
                else if($_GET["error"] == "pseudooremailtaken"){

                    echo "
                        <script type=\"text/javascript\">
                        document.getElementById('pseudo').value = '$ps';
                        document.getElementById('last_name').value = '$ln';
                        document.getElementById('first_name').value = '$fn';
                        document.getElementById('email').value = '$em';
                        </script>
                    ";

                    echo "<h1>Pseudo or Email already used...</h1>";
                }
                else if($_GET["error"] == "stmtfailed"){

                    echo "
                        <script type=\"text/javascript\">
                        document.getElementById('pseudo').value = '$ps';
                        document.getElementById('last_name').value = '$ln';
                        document.getElementById('first_name').value = '$fn';
                        document.getElementById('email').value = '$em';
                        </script>
                    ";
                }
                else if($_GET["error"] == "none"){

                    echo "
                        <script type=\"text/javascript\">
                        document.getElementById('RegisterFormContainer').style.display = 'none';
                        document.getElementById('bienvenue').style.display = 'block';
                        </script>
                    ";
                }
            }

        ?>
    </div>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- Pied de page -->

    <footer class="footer">
        <ul>
            <li class="link">
                <a href="../LegalTerms/LegalTerms.php">Legal Terms</a>
            </li>
        </ul>


        <div class="poweredByOversight">
            <p class="poweredBy">Powered by <a href="../About/OversightTeam/OversightTeam.php" class="oversight">Oversight</a></p>
        </div>
    </footer>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    
</body>
</html>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
