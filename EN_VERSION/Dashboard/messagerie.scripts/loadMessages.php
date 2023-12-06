<?php
    //faire passer les sessions
    session_start();

    //connexion à la DB
    $bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'admin', 'admin');

    /**
     * On étudie la demande transmise dans l'URL en GET
     * pour savoir si on récupère les messages ou si on 
     * en écrit de nouveaux.
     */

    $task = "list"; //valeur par défaut si l'utilisateur n'écrit pas

    if(array_key_exists("task", $_GET)){ //verif s'il y a une donnée dans l'URL
        $task = $_GET['task'];
    }

    if($task == "write"){ //si l'utilisateur écrit
        postMessage(); //on envoie le message à la DB avec cette fonction php
    } else {
        getMessages(); //sinon on affiche juste les messages avec getMessages()
    }

    /**
     * Pour récupérer les données en JS, il nous faut envoyer du JSON
     */
    function getMessages(){
        global $bdd; //pour utiliser $db dans notre fonction
        //on envoie une requete à la BDD pour selectionner les 20 derniers mesages
        $results = $bdd->query('SELECT * FROM messages ORDER BY date DESC LIMIT 100');

        //on traite les résulats
        $messages = $results->fetchAll(); //recup toutes les données

        //on affiche les données sous forme de JSON
        echo json_encode($messages);
    }

    /**
     * Si on veut écrire, on analyse les paramètres envoyés en POST
     * pour les stoquer dans notre BDD
     */
     function postMessage(){
        global $bdd;

        //variable de session
        $id_user = $_SESSION['id'];

        //Recup le pseudo
        $recupPseudo = $bdd->prepare('SELECT * FROM users WHERE id = ?');
        $recupPseudo->execute(array($_SESSION["id"]));
        $pseudo = $recupPseudo->fetch()['pseudo'];

        //verif du POST
        if(!array_key_exists('description', $_POST)){
            echo json_encode(["status" => "error"]);
            return;
        }

        //analyser les paramètres passés en POST
        $message = nl2br(htmlspecialchars($_POST['description'])); //nl2br pour le retour à la ligne et htmlspecialchars contre les failles xml
        //Créer une requetes pour insérer les données dans la DB
        $insertText = $bdd->prepare('INSERT INTO messages(message, date, pseudo) VALUES(?,NOW(),?)');
        $insertText->execute(array($message, $pseudo));

        //donner un statut de succès ou d'erreur au format JSON
        echo json_encode(["status" => "success"]);
     }
?>