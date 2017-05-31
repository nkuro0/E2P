<?php
var_dump($_GET['id']);
$sql = "DELETE FROM cat_join
        WHERE jeux_id = :id";
$sql2 = "DELETE FROM avis_join
          WHERE jeux_id = :id";
$sql3 = "DELETE FROM avis_jeux
          WHERE avis_jeux_id = :id";
$sql4 = "DELETE FROM jeux
        WHERE id = :id";
$result = $dbh->prepare($sql);
$result->execute([
    'id' => $_GET['id'],
]);
$result = $dbh->prepare($sql2);
$result->execute([
    'id' => $_GET['id'],
]);
$result = $dbh->prepare($sql3);
$result->execute([
    'id' => $_GET['id'],
]);
$result = $dbh->prepare($sql4);
$result->execute([
    'id' => $_GET['id'],
]);
echo '<h3>Le jeu a bien été supprimer</h3>';