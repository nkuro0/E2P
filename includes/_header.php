<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

spl_autoload_register(function($class) {
    require_once 'lib/'.$class.'.php';
});
require 'includes/config.inc.php';
// connexion DB //
$dbh = DB::getInstance();
// Instanciation classe Helper
$cutText = new Helper();
// Fonction de tri
require_once "actions/tri.php";
require 'lib/panier.php';
$panier = new panier($dbh);

?>