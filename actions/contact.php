<?php
session_start();
require '../includes/config.inc.php';
spl_autoload_register(function($class) {
    require '../lib/'.$class.'.php';
});
$dbh = DB::getInstance();
$_SESSION['ValidateMail'] = "";
var_dump($_POST);
if(isset($_SESSION['auth'])){
    $sql="INSERT INTO mail (pseudo, firstname, name, user_id, text, mail, dateMail, dateTime) VALUES (:pseudo, :firstname, :name, :user_id, :text, :mail, CURDATE(), CURTIME())";
    $result= $dbh->prepare($sql);
    $result->execute([
        'pseudo' => $_POST['username'],
        'firstname' => $_POST['firstname'],
        'name' => $_POST['name'],
        'user_id' => $_POST['idUser'],
        'text' => $_POST['text'],
        'mail' => $_POST['mail']
    ]);
}
else {
    $sql="INSERT INTO mail (firstname, name, text, mail, dateMail, dateTime) VALUES (:firstname, :name, :text, :mail, CURDATE(), CURTIME())";
    $result= $dbh->prepare($sql);
    $result->execute([
        'firstname' => $_POST['firstname'],
        'name' => $_POST['name'],
        'text' => $_POST['text'],
        'mail' => $_POST['mail']
    ]);
}

$_SESSION['ValidateMail'] = "Votre message à été envoyé au support";

header ('location:' .$_SERVER['HTTP_REFERER']);

