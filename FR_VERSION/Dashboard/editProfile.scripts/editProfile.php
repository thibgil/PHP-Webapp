<?php
    //faire passer les sessions
    session_start();

    //récup id de la session
    $id_user = $_SESSION["id"];

    //connexion à la DB
    $bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'admin', 'admin');

    //vérif des variables POST + envoi à la DB
    if (isset($_POST['save'])){
        if(!empty($_POST['email'])){
            $email = $_POST['email'];
            $insertText = $bdd->prepare('UPDATE users SET email = ? WHERE id = ?');
            $insertText->execute(array($email, $id_user));
        } 

        if(!empty($_POST['pseudo'])){
            $pseudo = $_POST['pseudo'];
            $insertText = $bdd->prepare('UPDATE users SET pseudo = ? WHERE id = ?');
            $insertText->execute(array($pseudo, $id_user));
        } 

        if(!empty($_POST['last_name'])){
            $last_name = $_POST['last_name'];
            $insertText = $bdd->prepare('UPDATE users SET last_name = ? WHERE id = ?');
            $insertText->execute(array($last_name, $id_user));
        } 

        if(!empty($_POST['first_name'])){
            $first_name = $_POST['first_name'];
            $insertText = $bdd->prepare('UPDATE users SET first_name = ? WHERE id = ?');
            $insertText->execute(array($first_name, $id_user));
        }
        
        header("location: ../Dashboard.php"); 
        exit(); 
    }

?>