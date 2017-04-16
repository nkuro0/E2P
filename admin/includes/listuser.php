<?php

if($_SESSION['auth']->levelUser <= 3){
    echo '<h2>Vous n\'avez pas les droits pour modifier les utilisateurs</h2>';
}
else {
$sql ="SELECT *
FROM users";
$result = $dbh->query($sql);
?>
<h3>Gestion des utilisateurs&nbsp;&nbsp;&nbsp;[<a href="?forms=userinsert">Ajouter</a>]</h3>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>pseudo</th>
        <th>mail</th>
        <th>niveau</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetchObject()):;?>
        <tr>
            <td><?=$row->name?></td>
            <td><?=$row->firstname?></td>
            <td><?=$row->username?></td>
            <td><?=$row->mail?></td>
            <td><?=$row->levelUser?></td>
            <td><a href="?forms=userupdate&id=<?=$row->id?>" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a></td>
            <td><a href="?actions=deluser&id=<?=$row->id?>" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a></td>
        </tr>
    <?php endwhile;?>
    </tbody>
</table>

<?php } ?>

