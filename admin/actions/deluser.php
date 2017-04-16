<?php

$sql = "DELETE FROM users WHERE id = :id";
$result = $dbh->prepare($sql);
$result->execute([
    'id' => $_GET['id']
]);

echo '<h3>L\'utilisateur à bien été supprimer</h3>';