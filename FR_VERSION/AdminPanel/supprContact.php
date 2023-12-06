<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8;', 'admin', 'admin');
if(isset($_GET['id'])){
    $selectUser = $bdd->prepare('SELECT * from contact WHERE id=?');
    $selectUser->execute(array($_GET['id']));
    if($selectUser->rowCount() > 0){
        $deleteUser = $bdd->prepare('DELETE from contact WHERE id=?');
        $deleteUser->execute(array($_GET['id']));
        header("Location: adminPanel.php");
    } else {
        echo "The select contact doesn't exist ...";
    }
} else {
    echo "ERROR, the 'id' is invalid !";
}
?>