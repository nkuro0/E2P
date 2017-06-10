<?php
if($_SESSION['auth']->levelUser <= 2){
    echo '<h2>Vous n\'avez pas les droits pour modifier les jeux disponible</h2>';
}
else{
$sql = "SELECT slides.jeux_id, slides.id, slides.img, slides.view, jeux.prix, jeux.title FROM slides INNER JOIN jeux ON jeux.id=slides.jeux_id ORDER BY jeux.title ASC";


    if(isset($_GET['order'])){
        $rightSql = "SELECT slides.jeux_id, slides.img, slides.view, jeux.prix, jeux.title FROM slides INNER JOIN jeux ON jeux.id=slides.jeux_id ";
        $tri_autorises = array('title', 'prix');
        $order_by = in_array($_GET['order'],$tri_autorises) ? $_GET['order'] : 'title';
        $order_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';
        $sql = $rightSql.'ORDER BY '.$order_by.' '.$order_dir;
    }

    $resultMenu = $dbh->query($sql);

?>

    <h3>Gestion du slider&nbsp;&nbsp;&nbsp;[<a href="?page=slidesinsert">Ajouter</a>]</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Image</th>
            <th><?php echo sort_link('slide&order=','Nom', 'title') ?></th>
            <th><?php echo sort_link('slide&order=','Prix', 'prix') ?></th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $resultMenu->fetchObject()):?>
            <tr>
                <td><img src="../img/slider/<?=$row->img?>" style="width: 500px;"></td>
                <td><?=$row->title?></td>
                <td><?=$row->prix?>€</td>
                <td><a href="?page=slidesupdate&id=<?=$row->id?>" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></a></td>
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
                            <a href="?page=delslides&id=<?=$row->jeux_id?>" type="submit" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile;?>
        </tbody>
    </table>
<?php } ?>