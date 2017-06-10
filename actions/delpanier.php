<?php
if($_GET){
    if(isset($_GET['id'])){

        $sql = "SELECT id
                FROM jeux
                WHERE id = ".$_GET['id'];

        $affichagejeux = $dbh->prepare($sql);
        $affichagejeux->execute();
        $jeu = $affichagejeux->fetchObject();

        $panier->del($jeu->id);
        header('location: ?page=panier');
    }
}

?>