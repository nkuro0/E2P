<?php
if($_SESSION['auth']->levelUser <= 2){
    echo '<h2>Vous n\'avez pas les droits pour modifier les jeux disponible</h2>';
}
else {
$sql ="SELECT id, title, prix, eval, quantity, quantitySold, DATE_FORMAT(datePub, '%d/%m/%y') AS `date`, imgSmall, quantity, description, view
FROM jeux ORDER BY datePub DESC";
$result = $dbh->query($sql);

?>
<h3>Gestion des jeux&nbsp;&nbsp;&nbsp;[<a href="?forms=jeuxinsert">Ajouter</a>]</h3>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Image</th>
        <th>Titre</th>
        <th>Date Création</th>
        <th>prix</th>
        <th>Evaluation</th>
        <th>quantité</th>
        <th>Description</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetchObject()):;?>
        <tr>
            <td><img src="../img/imgJeux/<?=$row->imgSmall?>" style="width: 50px;"></td>
            <td><?=$row->title?></td>
            <td><?=$row->date?></td>
            <td><?=$row->prix?>€</td>
            <td><?=$row->eval?></td>
            <td><?=$row->quantity?></td>
            <td><?= $cuttext->justcut($row->description)?></td>
            <td><a href="?forms=jeuxupdate&id=<?=$row->id?>" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a></td>
            <td><a href="?actions=deljeux&id=<?=$row->id?>" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a></td>
        </tr>
    <?php endwhile;?>
    </tbody>
</table>
<?php } ?>


