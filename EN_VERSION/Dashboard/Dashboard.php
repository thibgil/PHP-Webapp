<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'admin', 'admin');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Infinite Measures</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" type="image/png" href="../img/factorypng.png">
    <link rel='stylesheet' type='text/css' media='screen' href='Dashboard.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">//on importe JQUERY pour rendre le chat instantanné</script>
</head>
<body>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <!-- En-tête de page -->
    <header class="header">

        <nav class="menuNav">

            <img src="../img/logoIM.png" alt="logoIM" height="125" width="125" class="logoIM">
        
            <p class="slogan">
                THE NEW INDUSTRY
            </p>

            <form action="../Config/languages.includes.php" method="post">
                <select name='language' id="language" onchange='this.form.submit()'>
                    <option value="EN">EN</option>
                    <option value="FR">FR</option>
                </select>
                <input type="hidden" name="URL" id="URL" value="Dashboard/Dashboard.php">
                <input type="hidden" name="formsend" value="submit">
            </form>

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

                if(isset($_SESSION["id"])){
                    echo "<li class='button' style='text-decoration:underline'><a href='Dashboard.php'>Dashboard</a></li>";

                    $bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'admin', 'admin');
                    $recupUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
                    $recupUser->execute(array($_SESSION['id']));
                    $isAdmin = $recupUser->fetch()['isAdmin'];

                    if($isAdmin == 1){
                        echo "<li class='button'><a href='../AdminPanel/adminPanel.php'>Admin-Panel</a></li>";
                    }

                    echo "<li class='button'><a href='../Log/php.scripts/logout.php'>Log out</a></li>";
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

    <!-- Fenetre de modif de profil -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1 style='text-decoration:underline'>Edit your informations</h1>
        <form class="containerInputsMod" action="editProfile.scripts/editProfile.php" method="POST">
            <div class='DivMod'>
                <label>Email:</label>
                <input class='email' id='inputMod' type="text" name="email" autocomplete="off" placeholder="New email...">
            </div>

            <div class='DivMod'>
                <label>Pseudo:</label>
                <input class='pseudo' id='inputMod' type="text" name="pseudo" autocomplete="off" placeholder="New pseudo...">
            </div>

            <div class='DivMod'>
                <label>Last Name:</label>
                <input class='last_name' id='inputMod' type="text" name="last_name" autocomplete="off" placeholder="New last name...">
            </div>

            <div class='DivMod'>
                <label>First Name:</label>
                <input class='first_name' id='inputMod' type="text" name="first_name" autocomplete="off" placeholder="New first name...">
            </div>
                <input type="submit" name="save" class='edit_profile_btn'>
        </form>
    </div>

    </div>

    <div class="graph_global_container">
        <div class="graph_section_title">
            <h1 class="title">Personnal Measures</h1>
        </div>

        <div class="graph_container">
            <div class="graph_pollution_sensor">
            </div>

            <div class="graph_sound_sensor">
            </div>

            <div class="graph_heart_sensor">
            </div>
        </div>
    </div>
    </div>

    <div class="dash">
    <div class="global_container">
            <div class="info_user">
                <?php
                    echo '<h1 class="profile_title">Profile</h1>';

                    $bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'admin', 'admin');

                    if(isset($_SESSION["id"])){
                        $recupUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
                        $recupUser->execute(array($_SESSION["id"]));
                        $_SESSION["email"] = $recupUser->fetch()['email'];

                        echo "<h1 class='emailInput'>Email : " . $_SESSION["email"] . "</h1>";
                        
                        $recupUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
                        $recupUser->execute(array($_SESSION["id"]));
                        $_SESSION["pseudo"] = $recupUser->fetch()['pseudo'];
                        
                        echo "<h1>Pseudo : " . $_SESSION["pseudo"] . "</h1>";


                        $recupUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
                        $recupUser->execute(array($_SESSION["id"]));
                        $_SESSION["last_name"] = $recupUser->fetch()['last_name'];

                        echo "<h1>Last Name : " . $_SESSION["last_name"] . "</h1>";

                        $recupUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
                        $recupUser->execute(array($_SESSION["id"]));
                        $_SESSION["first_name"] = $recupUser->fetch()['first_name'];
                        
                        echo "<h1>First Name : " . $_SESSION["first_name"] . "</h1>";
                    }
                ?>
                <div class='btn-edit'>
                    <!-- Trigger/Open The Modal -->
                    <button class='edit_profile_btn' id="editBtn">Edit profile</button>
                </div>
            </div>
            <div class="message_container">
                <h1 class="live_chat_title">Live Chat</h1>
                    <div id="messages" class="messages">
                        <!-- c'est ici qu'on affiche les messages en JS -->
                    </div>
                    <form method="POST" action="messagerie.scripts/loadMessages.php?task=write" class='formChat'>
                    
                        <input id='messageForm' type="text" name="description" autocomplete="off">
                        
                        <div class="submit_div">
                            <button id='btn-sub' type="submit" name="send">Send</button>
                        </div>
                    
                    </form>
            </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("editBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
    </script>

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

    <script src='messagerie.scripts/messagerie.js'></script>

</body>
</html>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>