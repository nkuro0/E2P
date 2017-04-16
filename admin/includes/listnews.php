<?php
$sql ="SELECT id, title, DATE_FORMAT(datePub, '%d/%m/%y') AS `date`, img, content
FROM news ORDER BY datePub DESC";
$result = $dbh->query($sql);
?>
<h3>Gestion des actualités&nbsp;&nbsp;&nbsp;[<a href="?forms=newsInsert">Ajouter</a>]</h3>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Image</th>
        <th>Titre</th>
        <th>Date Création</th>
        <th>Contenu</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetchObject()):;?>
        <tr>
            <td><img src="../img/imgNews/<?=$row->img?>" style="width: 50px;"></td>
            <td><?=$row->title?></td>
            <td><?=$row->date?></td>
            <td><?=$row->content?></td>
            <td><a href="?forms=newsupdate&id=<?=$row->id?>" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a></td>
            <td><a href="?actions=newsdelete&id=<?=$row->id?>" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a></td>
        </tr>
    <?php endwhile;?>
    </tbody>
</table>