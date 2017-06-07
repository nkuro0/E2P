<?php
$sql = "DELETE FROM avis_join WHERE user_id = :id";
$result = $dbh->prepare($sql);
$result->execute([
    'id' => $_GET['id']
]);
$sql = "DELETE FROM avis_jeux WHERE avis_user_id = :id";
$result = $dbh->prepare($sql);
$result->execute([
    'id' => $_GET['id']
]);
$sql = "DELETE FROM users WHERE id = :id";
$result = $dbh->prepare($sql);
$result->execute([
    'id' => $_GET['id']
]);


echo '<h3>L\'utilisateur à bien été supprimer</h3>';