<?php
$sql ="SELECT * FROM mail ORDER BY dateMail DESC";
$result = $dbh->query($sql);
if(isset($_GET['order'])){
    $rightSql = "SELECT *
                        FROM mail
                        ";
    $tri_autorises = array('pseudo','firstname', 'name', 'mail', 'dateMail', 'dateTime');
    $order_by = in_array($_GET['order'],$tri_autorises) ? $_GET['order'] : 'dateMail';
    $order_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';
    $sql = $rightSql.'ORDER BY '.$order_by.' '.$order_dir;
}
$result = $dbh->query($sql);
?>

<h3>Gestion des Mails</h3>
<table class="table table-hover">
    <thead>
    <tr>
        <th><?php echo sort_link('mail&order=','Pseudo', 'pseudo') ?></th>
        <th><?php echo sort_link('mail&order=','Nom', 'name') ?></th>
        <th><?php echo sort_link('mail&order=','Prénom', 'firstname') ?></th>
        <th>Message</th>
        <th><?php echo sort_link('mail&order=','Mail', 'mail') ?></th>
        <th><?php echo sort_link('mail&order=','Date', 'dateMail') ?></th>
        <th><?php echo sort_link('mail&order=','Heure', 'dateTime') ?></th>
        <th>Supprimer</th>
</tr>
</thead>
<tbody>
<?php while ($row = $result->fetchObject()):?>
    <tr>
        <?php if(empty($row->pseudo)):?>
            <td>Non inscrit</td>
            <?php else: ?>
            <td><?=$row->pseudo?></td>
        <?php endif;?>
        <td><?=$row->name?></td>
        <td><?=$row->firstname?></td>
        <td><?=$row->text?></td>
        <td><?=$row->mail?></td>
        <td><?=$row->dateMail?></td>
        <td><?=$row->dateTime?></td>
        <td><a href="#deletepost-" data-toggle="modal" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a></td>

    </tr>
    <div id="deletepost-" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Suppression de la news</h4>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer cet article ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <a href="?page=delmail&id=<?=$row->id?>" type="submit" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
</tbody>
</table>