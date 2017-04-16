<?php
// Configuration
session_start();
require '../../includes/config.inc.php';
spl_autoload_register(function($class) {
   require '../../lib/'.$class.'.php';
});
// Vérif session classe

// Requête update
$dbh = DB::getInstance();
//var_dump($_POST);exit;
$sql = "UPDATE pages
        SET link=    :link,
            view=    :view,
            content= :content
        WHERE id = :id";
$result=$dbh->prepare($sql);

$nb = $result->execute(
    [
        'link'      => $_POST['link'],
        'view'      => $_POST['view'],
        'content'   => $_POST['content'],
        'id'        => $_POST['id']
    ]
);

// Tests validation
if ($nb) {
    $_SESSION['er'] = 'ok';
}
else {
    $_SESSION['er'] = 'no';
}


// Redirection
header('location: '.$_SERVER['HTTP_REFERER'].'');