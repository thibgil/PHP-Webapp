<?php

    if(isset($_POST["formsend"])){

        $pseudo = $_POST["pseudo"];
        $last_name = $_POST["last_name"];
        $first_name = $_POST["first_name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeatpassword"];
        $acceptLT = $_POST["acceptLT"];
        
        require_once '../../Config/database.php'; //connection à la DB
        require_once '../../Config/functions.include.php'; //import de fontions

        if($password != ''){
            $ps = '*';
        }

        if($repeat_password != ''){
            $rp = '*';
        }

        if(emptyInputSignup($pseudo, $last_name, $first_name, $email, $password, $repeat_password) !== false){
            header("location: ../Register.php?error=emptyinput&ps=$pseudo&ln=$last_name&fn=$first_name&em=$email&pw=$ps&rp=$rp&lt=$acceptLT"); //retour à la page de Register avec l'erreur 'emptyinput'
            exit(); //vide le form en cours
        }

        if(invalidPseudo($pseudo) !== false){
            header("location: ../Register.php?error=invalidpseudo&ps=$pseudo&ln=$last_name&fn=$first_name&em=$email&pw=$ps&rp=$rp&lt=$acceptLT"); //retour à la page de Register avec l'erreur 'invalidpseudo'
            exit(); 
        }

        if(invalidEmail($email) !== false){
            header("location: ../Register.php?error=invalidemail&ps=$pseudo&ln=$last_name&fn=$first_name&em=$email&pw=$ps&rp=$rp&lt=$acceptLT"); //retour à la page de Register avec l'erreur 'invalidemail'
            exit(); 
        }

        if(invalidPasswd($password) !== false){
            header("location: ../Register.php?error=invalidpasswd&ps=$pseudo&ln=$last_name&fn=$first_name&em=$email&pw=$ps&rp=$rp&lt=$acceptLT"); //retour à la page de Register avec l'erreur 'invalidpasswd'
            exit();
        }

        if(passwdMatch($password, $repeat_password) !== false){
            header("location: ../Register.php?error=invalidpasswdmatch&ps=$pseudo&ln=$last_name&fn=$first_name&em=$email&pw=$ps&rp=$rp&lt=$acceptLT"); //retour à la page de Register avec l'erreur 'invalidpasswdmatch'
            exit(); 
        }

        if(ltNotChecked($acceptLT) !== false){
            header("location: ../Register.php?error=ltnotchecked&ps=$pseudo&ln=$last_name&fn=$first_name&em=$email&pw=$ps&rp=$rp&lt=$acceptLT"); //retour à la page de Register avec l'erreur 'ltnotchecked'
            exit();
        }

        if(pseudoOrEmailExists($conn, $pseudo, $email) !== false){
            header("location: ../Register.php?error=pseudooremailtaken&ps=$pseudo&ln=$last_name&fn=$first_name&em=$email&pw=$ps&rp=$rp&lt=$acceptLT"); //retour à la page de Register avec l'erreur 'pseudooremailtaken'
            exit();
        }

        

        createUser($conn, $last_name, $first_name, $email, $pseudo, $password);

    } else { //secu pour ne pas pouvoir atteindre le script depuis un lien web
        header("location: ../Register.php");
        exit();
    }