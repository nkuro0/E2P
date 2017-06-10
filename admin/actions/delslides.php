<?php

$sql = "DELETE FROM slides
        WHERE jeux_id = :id";
$result = $dbh->prepare($sql);
$result->execute([
    'id' => $_GET['id'],
]);
echo "<h3>Votre slide à bien été supprimé</h3>";