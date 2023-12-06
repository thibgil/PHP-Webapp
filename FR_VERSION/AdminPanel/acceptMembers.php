<?php
$bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'admin', 'admin');
if(isset($_GET['id'])){
    $selectUser = $bdd->prepare('SELECT * from users WHERE id=?');
    $selectUser->execute(array($_GET['id']));
    if($selectUser->rowCount() > 0){
        $acceptUser = $bdd->prepare('UPDATE users SET accepted=1 WHERE id=?');
        $acceptUser->execute(array($_GET['id']));
        header("Location: adminPanel.php");
    } else {
        echo "Error, call an administrator ...";
    }
} else {
    echo "ERROR, the 'id' is invalid !";
}
?>