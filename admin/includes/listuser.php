<?php

if($_SESSION['auth']->levelUser <= 3){
    echo '<h2>Vous n\'avez pas les droits pour modifier les utilisateurs</h2>';
}
else {
$sql ="SELECT users.levelUser, users.id, users.name, users.firstname, users.username, users.mail, level_users.name AS `levelName`
FROM users
INNER JOIN level_users ON level_users.level = users.levelUser";
$result = $dbh->query($sql);
    if(isset($_GET['order'])){
        $rightSql = "SELECT users.levelUser, users.id, users.name, users.firstname, users.username, users.mail, level_users.name AS `levelName`
                        FROM users
                        INNER JOIN level_users ON level_users.id = users.levelUser
                        ";
        $tri_autorises = array('name','firstname','username','mail', 'levelUser');
        $order_by = in_array($_GET['order'],$tri_autorises) ? $_GET['order'] : 'name';
        $order_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';
        $sql = $rightSql.'ORDER BY '.$order_by.' '.$order_dir;
    }
    $result = $dbh->query($sql);
    ?>
<h3>Gestion des utilisateurs&nbsp;&nbsp;&nbsp;[<a href="?forms=userinsert">Ajouter</a>]</h3>
<table class="table table-hover">
    <thead>
    <tr>
        <th><?php echo sort_link('user&order=','Nom', 'name')?></th>
        <th><?php echo sort_link('user&order=','Prénom', 'firstname')?></th>
        <th><?php echo sort_link('user&order=','Pseudo', 'username')?></th>
        <th><?php echo sort_link('user&order=','Mail', 'mail')?></th>
        <th><?php echo sort_link('user&order=','Niveau', 'levelUser')?></th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetchObject()):;?>
        <tr>
            <td><?=$row->name?></td>
            <td><?=$row->firstname?></td>
            <td><?=$row->username?></td>
            <td><?=$row->mail?></td>
            <td><?=$row->levelName?></td>
            <td><a href="?forms=userupdate&id=<?=$row->id?>" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a></td>
            <td><a href="#deletepost-<?=$row->id?>" data-toggle="modal" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a></td>
        </tr>

        <div id="deletepost-<?=$row->id?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Suppression de l'utilisateur</h4>
                    </div>
                    <div class="modal-body">
                        <p>Voulez-vous vraiment supprimer cet utilisateur ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <a href="?actions=deluser&id=<?=$row->id?>" type="submit" class="btn btn-danger">Supprimer</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile;?>
    </tbody>
</table>

<?php } ?>

