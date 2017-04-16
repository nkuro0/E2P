<?php
require '../../includes/config.inc.php';
spl_autoload_register(function($class){
    require '../../lib/'.$class.'.php';
});
Helper::verif(5);
$dbh= DB::getInstance();

$sql = "DELETE FROM pages WHERE id = :id";
$result = $dbh->prepare($sql);
$result->execute([
    'id' => $_GET['id']
]);
header('location: ../index.php?page=news');