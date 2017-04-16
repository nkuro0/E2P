<?php
$sql = "DELETE FROM news WHERE id = :id";
$result = $dbh->prepare($sql);
$result->execute([
    'id' => $_GET['id']
]);

echo '<h3>La news a bien été supprimer</h3>';