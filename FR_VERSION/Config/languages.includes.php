<?php

    if(isset($_POST["formsend"]) && $_POST["formsend"] == "submit"){

        $language = $_POST["language"];
        $actual_link = $_POST["URL"];

        header("location: ../index.php?url=$actual_link");

        if($language == "EN"){
            header("location: ../../EN_VERSION/$actual_link");
        } 
        else if($language == "FR"){
            header("location: ../../FR_VERSION/$actual_link");
        }

    } 
    else { //secu pour ne pas pouvoir atteindre le script depuis un lien web
        $actual_link = $_POST["URL"];
        header("location: wtf/$actual_link");
        exit();
    }