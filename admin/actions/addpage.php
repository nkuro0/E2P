<?php
session_start();
require '../../includes/config.inc.php';
spl_autoload_register(function ($class) {
    require '../../lib/'.$class.'.php';
});
Helper::verif(5);
$dbh = DB::getInstance();

// Validation Champs

if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['link']) || empty($_POST['content'])) {
    $_SESSION['er'] = "empty";
}
// Insertion

$sql = "INSERT INTO pages VALUES(null, :title, :description, :link, :slug, :view, :content)";
$result = $dbh->prepare($sql);
$nb = $result->execute([
    'title'             => $_POST['title'],
    'description'       => $_POST['description'],
    'link'              => $_POST['link'],
    'slug'              => Helper::slug($_POST['link']),
    'view'              => $_POST['view'],
    'content'           => $_POST['content']
    ]);

// Vérifier si l'opération est OK
if ($nb) {
    $_SESSION['er'] = 'ok';
}
else {
    $_SESSION['er'] = 'no';
}
// Redirection
header ('location: '.$_SERVER['HTTP_REFERER'].'');