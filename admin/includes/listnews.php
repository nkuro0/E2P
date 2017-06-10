<?php
$sql ="SELECT id, title, datePub, img, content
FROM news ORDER BY datePub DESC";
$result = $dbh->query($sql);
if(isset($_GET['order'])){
$rightSql = "SELECT id, title, datePub, img, content
                        FROM news
                        ";
$tri_autorises = array('title','datePub');
$order_by = in_array($_GET['order'],$tri_autorises) ? $_GET['order'] : 'datePub';
$order_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';
$sql = $rightSql.'ORDER BY '.$order_by.' '.$order_dir;
}
$result = $dbh->query($sql);
?>
<h3>Gestion des actualités&nbsp;&nbsp;&nbsp;[<a href="?page=newsInsert">Ajouter</a>]</h3>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Image</th>
        <th><?php echo sort_link('news&order=','Titre', 'title')?></th>
        <th><?php echo sort_link('news&order=','Date', 'datePub')?></th>
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
            <td><?=$row->datePub?></td>
            <td><?=$row->content?></td>
            <td><a href="?page=newsupdate&id=<?=$row->id?>" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a></td>
            <td><a href="#deletepost-<?=$row->id?>" data-toggle="modal" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a></td>
        </tr>
        <div id="deletepost-<?=$row->id?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
                        <a href="?page=newsdelete&id=<?=$row->id?>" type="submit" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile;?>
    </tbody>
</table>