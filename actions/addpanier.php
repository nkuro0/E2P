<?php
if(isset($_GET['id'])){

    $sql = "SELECT id
            FROM jeux
            WHERE id = ".$_GET['id'];

    $affichagejeux = $dbh->prepare($sql);
    $affichagejeux->execute();
    $jeu = $affichagejeux->fetchObject();

    if(empty($jeu)){
        die("produit inexistant");
    }
    $panier->add($jeu->id);
    header('location:' .$_SERVER['HTTP_REFERER']);
}

?>