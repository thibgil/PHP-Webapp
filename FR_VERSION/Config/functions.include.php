<?php

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // pour le formulaire d'insription

    function emptyInputSignup($pseudo, $last_name, $first_name, $email, $password, $repeat_password){
        if(empty($pseudo) || empty($last_name) || empty($first_name) || empty($email) || empty($password) || empty($repeat_password)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidPseudo($pseudo){
        if(!preg_match("/^[a-zA-Z0-9]*$/", $pseudo)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidPasswd($password){
        $number = preg_match('@[0-9]@', $password);
        $lower_case = preg_match('@[a-z]@', $password);
        $upper_case = preg_match('@[A-Z]@', $password);
        $special_chars = preg_match('@[^\w]@', $password);

        if(strlen($password) < 8 || strlen($password) > 30 || !$number || !$lower_case || !$upper_case || !$special_chars){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function passwdMatch($password,$repeat_password){
        if($password !== $repeat_password){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function ltNotChecked($acceptLT){
        if(!empty($acceptLT)){
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    function pseudoOrEmailExists($conn, $pseudo, $email){
        $sql = "SELECT * FROM users WHERE pseudo = ? OR email = ?;"; //requete SQL
        $stmt = mysqli_stmt_init($conn); //prepared statement
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../Register.php?error=stmtfailed"); //retour à la page de Register avec l'erreur 'stmtfailed'
            exit(); 
        }

        mysqli_stmt_bind_param($stmt, "ss", $pseudo, $email); // "ss" car deux chaines sont transmisent
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        } else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $last_name, $first_name, $email, $pseudo, $password){
        $sql = "INSERT INTO users (last_name, first_name, email, pseudo, passwd) VALUES (?, ?, ?, ?, ?);"; //requete SQL
        $stmt = mysqli_stmt_init($conn); //prepared statement
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../Register.php?error=stmtfailed"); //retour à la page de Register avec l'erreur 'stmtfailed'
            exit(); 
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); //secu avec hashing des passwords

        mysqli_stmt_bind_param($stmt, "sssss", $last_name, $first_name, $email, $pseudo, $hashedPassword); // "sssss" car deux chaînes sont transmises
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../Register.php?error=none");
        exit();
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //pour le login

    function emptyInputLogin($email, $password){
        if(empty($email) || empty($password)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $email, $password){
        $emailExists = pseudoOrEmailExists($conn, $email, $email);

        if($emailExists === false){
            header("location: ../log.php?error=wronglogin");
            exit();
        }

        $hashedPassword = $emailExists["passwd"];
        $checkPassword = password_verify($password, $hashedPassword);

        if($checkPassword === false){
            header("location: ../log.php?error=wronglogin");
            exit();
        }
        else if($checkPassword === true){
            $bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'admin', 'admin');
            $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
            $recupUser->execute(array($email));
            $isAccepted = $recupUser->fetch()['accepted'];

            if($isAccepted == 1){
                session_start();
                $_SESSION["id"] = $emailExists["id"];
                $_SESSION["email"] = $emailExists["email"];

                header("location: ../../Dashboard/Dashboard.php");
                //header("location: ../../index.php");
                exit();
            }
            else {
                header("location: ../log.php?error=notaccepted");
                exit();
            }

        }
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //pour le formulaire de contact

    function emptyInputContact($first_name, $last_name, $email, $msg){
        if(empty($first_name) || empty($last_name) || empty($first_name) || empty($email) || empty($msg)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function createContact($conn, $last_name, $first_name, $email, $msg){
        $sql = "INSERT INTO contact (last_name, first_name, email, msg) VALUES ('$last_name', '$first_name', '$email', '$msg');"; //requete SQL
        $stmt = mysqli_stmt_init($conn); //prepared statement
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../Contact.php?error=stmtfailed"); //retour à la page de Register avec l'erreur 'stmtfailed'
            exit(); 
        }


        mysqli_stmt_bind_param($stmt, "ssss", $last_name, $first_name, $email, $msg); // "sssss" car deux chaînes sont transmises
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../Contact.php?error=none");
        exit();
    }
