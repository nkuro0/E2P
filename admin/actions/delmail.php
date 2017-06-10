<?php

$sql = "DELETE FROM mail WHERE id = :id";
$result = $dbh->prepare($sql);
$result->execute([
    'id' => $_GET['id']
]);

echo '<h3>Ce mail à bien été supprimé</h3>';