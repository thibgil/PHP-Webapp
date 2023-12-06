<?php

    if(isset($_POST["formsend"])){

        $last_name = nl2br(htmlspecialchars($_POST["last_name"]));
        $first_name = nl2br(htmlspecialchars($_POST["first_name"]));
        $email = nl2br(htmlspecialchars($_POST["email"]));
        $msg = nl2br(htmlspecialchars($_POST["message"], ENT_QUOTES));
  
        require_once '../../Config/database.php'; //connection à la DB
        require_once '../../Config/functions.include.php'; //import de fontions

        if(emptyInputContact($first_name, $last_name, $email, $msg) !== false){
            header("location: ../Contact.php?error=emptyinput"); //retour à la page de Contact avec l'erreur 'emptyinput'
            exit(); //vide le form en cours
        } 

        if(invalidEmail($email) !== false){
            header("location: ../Contact.php?error=invalidemail"); //retour à la page de Register avec l'erreur 'invalidemail'
            exit(); 
        }
        
        createContact($conn, $last_name, $first_name, $email, $msg);
        
    } else { //secu pour ne pas pouvoir atteindre le script depuis un lien web
        header("location: ../Contact.php");
        exit();
    }