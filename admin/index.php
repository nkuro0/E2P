<?php
session_start();
if(!isset($_SESSION['auth'])){
    require 'error404.html';
}
elseif($_SESSION['auth']->levelUser <= 1){
    require 'error404.html';
}
else {

require '../includes/config.inc.php';
spl_autoload_register(function($class){
    require '../lib/'.$class.'.php';
});

$_GET['page'] = $_GET['page'] ?? 'accueil';

$cuttext = new Helper();
$dbh = DB::getInstance();

require 'includes/header.inc.php';

?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administration de E2P
                        </h1>
                    </div>
                </div>

    <?php
    if($_GET['page']=='accueil'){
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
        <?php } ?>

                <div class="row">
                    <div class="col-xs-12">
                        <?php

                           if ($_GET['page'] == 'insertPage') {
                               require 'forms/pageinsert.php';
                           }
                           elseif ($_GET['page'] == 'pages') {
                                require 'forms/pageupdate.php';
                           }
                           elseif ($_GET['page'] == 'news'){
                               require 'includes/listnews.php';
                           }
                           elseif ($_GET['page'] == 'newsInsert') {
                               require 'forms/newsInsert.php';
                           }
                           elseif ($_GET['page'] == 'newsupdate') {
                               require 'forms/newsupdate.php';
                           }
                           elseif ($_GET['page'] == 'newsdelete') {
                               require 'actions/delnews.php';
                           }
                           elseif ($_GET['page'] == 'jeux') {
                               require 'includes/listjeux.php';
                           }
                           elseif ($_GET['page'] == 'jeuxinsert') {
                                require 'forms/jeuxinsert.php';
                           }
                           elseif ($_GET['page'] == 'jeuxupdate') {
                               require 'forms/jeuxupdate.php';
                           }
                           elseif ($_GET['page'] == 'deljeux') {
                               require 'actions/deljeux.php';
                           }
                           elseif ($_GET['page'] == 'user') {
                               require 'includes/listuser.php';
                           }
                           elseif ($_GET['page'] == 'userinsert') {
                               require 'forms/userinsert.php';
                           }
                           elseif ($_GET['page'] == 'userupdate') {
                               require 'forms/userupdate.php';
                           }
                           elseif ($_GET['page'] == 'deluser') {
                               require 'actions/deluser.php';
                           }
                           elseif ($_GET['page'] == 'mail') {
                               require 'includes/listmail.php';
                           }
                           elseif ($_GET['page'] == 'delmail') {
                               require 'actions/delmail.php';
                           }
                           elseif ($_GET['page'] == 'slide') {
                               require 'includes/listslide.php';
                           }
                           elseif ($_GET['page'] == 'slidesinsert') {
                               require 'forms/slidesinsert.php';
                           }
                           elseif ($_GET['page'] == 'slidesupdate') {
                               require 'forms/slidesupdate.php';
                           }
                           elseif ($_GET['page'] == 'delslides') {
                               require 'actions/delslides.php';
                           }
                           elseif ($_GET['page'] == 'updateslides') {
                               require 'actions/updateslides.php';
                           }
                           elseif ($_GET['page'] == 'commande') {
                               require 'includes/listcommande.php';
                           }
                        ?>
                    </div>
                </div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>

<?php } ?>