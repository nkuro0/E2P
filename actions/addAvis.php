<?php

require '../includes/config.inc.php';
spl_autoload_register(function ($class) {
    require '../lib/'.$class.'.php';
});

$dbh = DB::getInstance();

$jeuxId = $_POST['jeuxId'];
$userId = $_POST['userId'];
$text = $_POST['edit'];
$eval = $_POST['eval'];


$sql = "INSERT INTO avis_jeux (user_id, jeux_id, text, avis_eval) VALUES ('$userId', '$jeuxId', '$text', '$eval')";
$result = $dbh->prepare($sql);
$result->execute();

var_dump($_POST);
//header ('location:' .$_SERVER['HTTP_REFERER']);



