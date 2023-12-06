<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'admin', 'admin');
if(isset($_GET['id'])){
    $deletedUser = 'deletedUser';

    $selectUser = $bdd->prepare('SELECT * from users WHERE id=?');
    $selectUser->execute(array($_GET['id']));
    $pseudoUserToDelete = $selectUser->fetch()['pseudo'];
    //on delete les messages que l'utilisateur a écrit pour éviter une erreur de FOREIGN KEY
    $deleteMessages = $bdd->prepare('DELETE FROM messages WHERE pseudo = ?');
    $deleteMessages->execute(array($pseudoUserToDelete));

    //on suppr l'utilisateur concerné par le ban
    $selectUser = $bdd->prepare('SELECT * from users WHERE id=?');
    $selectUser->execute(array($_GET['id']));
    if($selectUser->rowCount() > 0){
        $deleteUser = $bdd->prepare('DELETE from users WHERE id=?');
        $deleteUser->execute(array($_GET['id']));
        header("Location: adminPanel.php");
    } else {
        echo "The select user doesn't exist ...";
    }
} else {
    echo "ERROR, the 'id' is invalid !";
}
?>