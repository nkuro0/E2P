<?php

$sql = "SELECT jeux.id, jeux.datePub, jeux.imgSmall, jeux.title, jeux.quantity, jeux.quantitySold, jeux.prix, jeux.description
        FROM jeux
        ORDER BY id DESC
        LIMIT 3";
$result = $dbh->query($sql);
$sql ="SELECT id, title, datePub, img, content
FROM news ORDER BY datePub DESC";
$result2 = $dbh->query($sql);
?>

    <h3 class="page header">Les derniers jeux ajouté</h3>
<table class="table table-hover">
    <thead>
<tr>
    <th>Image</th>
    <th>Titre</th>
    <th>Date de sortie du jeu</th>
    <th>Prix</th>
    <th>Quantité</th>
    <th>Description</th>
    <th>Modifier</th>
</tr>
    </thead>
    <tbody>
<?php while ($row = $result->fetchObject()):?>
    <tr>
        <td><img src="../img/imgJeux/<?=$row->imgSmall?>" style="width: 50px;"></td>
        <td><?=$row->title?></td>
        <td><?=$row->datePub?></td>
        <td><?=$row->prix?>€</td>
        <td><?=$row->quantity?></td>
        <td><?= $cuttext->justcut($row->description)?></td>
        <td><a href="?forms=jeuxupdate&id=<?=$row->id?>" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a></td>

    </tr>
<?php endwhile?>
    </tbody>
</table>

<h3>Les dernières news</h3>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Image</th>
        <th>Titre</th>
        <th>Date</th>
        <th>Contenu</th>
        <th>Modifier</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $result2->fetchObject()):?>
        <tr>
            <td><img src="../img/imgNews/<?=$row->img?>" style="width: 50px;"></td>
            <td><?=$row->title?></td>
            <td><?=$row->datePub?></td>
            <td><?=$row->content?></td>
            <td><a href="?forms=newsupdate&id=<?=$row->id?>" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a></td>

        </tr>
    <?php endwhile?>
    </tbody>
</table>

