<?php

$sql = "DELETE FROM panier WHERE id = :id";
$result = $dbh->prepare($sql);
$result->execute([
    'id' => $_GET['id']
]);

echo '<h3>Cette commande à bien été supprimé</h3>';