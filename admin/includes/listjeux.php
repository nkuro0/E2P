<?php
if($_SESSION['auth']->levelUser <= 2){
    echo '<h2>Vous n\'avez pas les droits pour modifier les jeux disponible</h2>';
}
else {

$sql ="SELECT id, title, prix, quantity, quantitySold, datePub, imgSmall, quantity, description, view
FROM jeux ORDER BY datePub DESC";

    if(isset($_GET['order'])){
        $rightSql = "SELECT jeux.id, jeux.datePub, jeux.imgSmall, jeux.title, jeux.quantity, jeux.quantitySold, jeux.prix, jeux.description
                        FROM jeux
                        ";
        $tri_autorises = array('title','datePub', 'prix', 'quantity', 'quantitySold');
        $order_by = in_array($_GET['order'],$tri_autorises) ? $_GET['order'] : 'datePub';
        $order_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';
        $sql = $rightSql.'ORDER BY '.$order_by.' '.$order_dir;
    }
    $result = $dbh->query($sql);
?>
<h3>Gestion des jeux&nbsp;&nbsp;&nbsp;[<a href="?page=jeuxinsert">Ajouter</a>]</h3>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Image</th>
        <th><?php echo sort_link('jeux&order=','Nom', 'title') ?></th>
        <th><?php echo sort_link('jeux&order=','Date', 'datePub') ?></th>
        <th><?php echo sort_link('jeux&order=','Prix', 'prix') ?></th>
        <th><?php echo sort_link('jeux&order=','Quantité', 'quantity') ?></th>
        <th><?php echo sort_link('jeux&order=','Quantité vendue', 'quantitySold') ?></th>
        <th>Description</th>
        <th>Modifier</th>
        <th>Supprimer</th>
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
            <td><?=$row->quantitySold?></td>
            <td><?= $cuttext->justcut($row->description)?></td>
            <td><a href="?page=jeuxupdate&id=<?=$row->id?>" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a></td>
            <td><a href="#deletepost-<?=$row->id?>" data-toggle="modal" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a></td>
        </tr>

        <div id="deletepost-<?=$row->id?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Suppression du produit</h4>
                    </div>
                    <div class="modal-body">
                        <p>Voulez-vous vraiment supprimer ce produit ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <a href="?page=deljeux&id=<?=$row->id?>" type="submit" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile;?>
    </tbody>
</table>
<?php } ?>


