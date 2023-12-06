<?php

    /* // 1st way with mysql and PDO
    define('HOST', 'localhost');
    define('DB_NAME', 'siteweb');
    define('USER', 'root');
    define('PASS', '');

    try{
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connect > OK" . "<br/>";
    } catch(PDOException $e){
        echo $e;
    }
    */

    //updated way with mysqli
    $serverName = 'localhost';
    $dBUsername = 'root';
    $dBPassword = '';
    $dBName = 'siteweb';

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    if(!$conn){
        die("Failed to connect to the DB ..." . mysqli_connect_error());
    }


