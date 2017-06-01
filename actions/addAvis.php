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
$statement = $_POST['avis_exist'];


if(isset($statement)){
    $sql = "UPDATE avis_jeux SET text = :text WHERE avis_user_id = :id AND avis_jeux_id = :jeux_id";
    $result = $dbh->prepare($sql);
    $result->execute([
        'text' => $text,
        'id' => $userId,
        'jeux_id' => $jeuxId
    ]);
    $sql = "UPDATE avis_join SET avis_eval = :eval WHERE user_id = :id AND jeux_id = :jeux_id";
    $result = $dbh->prepare($sql);
    $result->execute([
        'eval' => $eval,
        'id' => $userId,
        'jeux_id' => $jeuxId
    ]);
}
else{
    $sql = "INSERT INTO avis_jeux (avis_jeux_id, avis_user_id, text) VALUES ('$jeuxId', '$userId', '$text')";
    $result = $dbh->prepare($sql);
    $result->execute();
    $avis_jeuxId = $dbh->lastInsertId();
    $sql = "INSERT INTO avis_join (jeux_id, user_id, avis_id, avis_eval) VALUES ('$jeuxId', '$userId', '$avis_jeuxId', '$eval')";
    $result = $dbh->prepare($sql);
    $result->execute();
}


header ('location:' .$_SERVER['HTTP_REFERER']);



