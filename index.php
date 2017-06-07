<?php

require "includes/header.inc.php";

if($_GET['page'] === 'accueil' && !isset($_GET['order'])){
    header('Location: ?page=accueil&order');
}
if($_GET['page'] === 'catalogue' && !isset($_GET['order'])) {
    header('Location: ?page=catalogue&pagenbr=1&order');
}

if($_GET['page'] === ''){
    header('Location: ?page=accueil&order');
}

if($_GET['page'] == 'addpanier') {
require "actions/addpanier.php";
}

if($_GET['page'] == 'panier') {
    require "includes/panier.php";
}

if($_GET['page'] == 'delpanier') {
    require "actions/delpanier.php";
}
// Page d'inscription -----------------
if($_GET['page'] == 'inscription') {
    require 'includes/inscription.php';
}

elseif($_GET['page'] == 'logout') {
    require 'includes/logout.php';
}

elseif($_GET['page'] == 'recherche') {
    require 'includes/recherche.php';
}

// Page d'accueil -----------------
if($_GET['page'] == 'accueil') {
    require "includes/slider.inc.php";
    ?>


<div class="ui two row stackable grid">
    <div class="three column row">

<?php
require "includes/formlogin.php";

//Affichage "Maintenant disponible" --------------
    $rightSql = "SELECT id, title, quantity, description, prix, imgSmall, DATE_FORMAT(datePub, '%d/%m/%y') AS `date`
                 FROM jeux
                 WHERE `view` = 1
                 ";
    $tri_autorises = array('quantity','title', 'prix', 'date');
    $order_by = in_array($_GET['order'],$tri_autorises) ? $_GET['order'] : 'date';
    $order_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';
    $sql = $rightSql.'ORDER BY '.$order_by.' '.$order_dir;

    $affichagejeux = $dbh->prepare($sql);
    $affichagejeux->execute();
    $sql = "SELECT jeux.id, jeux.title, jeux.imgSmall, DATE_FORMAT(datePub, '%d-%m-%y') AS `date`, jeux.description, avis_jeux.text, avis_jeux.avis_user_id, avis_jeux.avis_jeux_id, avis_join.avis_eval, users.username, users.levelUser
                FROM jeux
                INNER JOIN avis_jeux ON avis_jeux.avis_jeux_id = jeux.id
                INNER JOIN users ON users.id = avis_jeux.avis_user_id
                INNER JOIN avis_join ON avis_join.avis_id = avis_jeux.id
                WHERE levelUser = 1
                ORDER BY avis_join.id DESC
                LIMIT 4";
    $avis = $dbh->prepare($sql);
    $avis->execute();
    ?>
            <!-- Affichage Maintenant disponible -->
<div class="ui ten wide column ">
    <h3 class="ui header center aligned segment">Maintenant disponible</h3>
    <div class="ui text menu">
        <div class="header item">Trier par</div>
        <?php echo sort_link('accueil&order=','Nom', 'title') ?>
        <?php echo sort_link('accueil&order=','Prix', 'prix') ?>
        <?php echo sort_link('accueil&order=','Date', 'date') ?>
        <?php echo sort_link('accueil&order=','Disponibilitée', 'quantity') ?>
    </div>
                <ul>

                    <?php $i=1; ?>
                    <?php while ($affichage = $affichagejeux->fetchObject()): ?>
                        <li class="jeuglobal" data-id="el<?= $affichage->id ?>">
                            <div class="jeuContent">
                                <ul>
                                    <li><img class="circleicon" src="img/icons/search.svg"><img class="imgjeux"
                                                src="img/imgjeux/<?= $affichage->imgSmall ?>" height="150" width="100"></li>
                                    <li class="placement">
                                        <ul class="placement-prix">
                                            <li class="priceText"><?= $affichage->prix ?>€</li>
                                                <li class="mini ui vertical animated button buybutton" tabindex="0">
                                                <div class="hidden content"><a href="?page=addpanier&id=<?= $affichage->id ?>">Acheter</div></a>
                                                <div class="visible content">
                                                    <i class="shop icon"></i>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- Modal -->
                            <div class="ui modal" id="modal-el<?= $affichage->id ?>">
                                <i class="close icon"></i>
                                <div class="header">
                                    <?= $affichage->title?>
                                </div>
                                <div class="image content">
                                    <div class="ui medium image">
                                        <img src="img/imgjeux/<?= $affichage->imgSmall ?>">
                                    </div>

                                    <div class="description">
                                        <div class="ui header"><?= $affichage->prix ?> €</div>
                                        <p><?= $cutText->cutString2($affichage->description, $affichage->id) ?></p>
                                        <div class="quantity">
                                            <?php if($affichage->quantity>0): ?>
                                                <h5 class="ui header" style="color: rgba(145, 222, 110, 1)">En stock</h5>
                                            <?php else: ?>
                                                <h5 class="ui header" style="color: rgba(179, 25, 38, 1)">Hors stock</h5>
                                            <?php endif?>
                                        </div>
                                    </div>
                                </div>
                                <div class="actions">
                                    <div class="ui black deny button">
                                        Fermer
                                    </div>
                                        <?php if($affichage->quantity>0):?>
                                        <a class="ui blue button" href="?page=addpanier&id=<?= $affichage->id ?>">Acheter</a>
                                        <?php endif; ?>
                                </div>
                            </div>
                        </li>
                        <?php $i++ ?>
                    <?php endwhile; ?>

                </ul>
    </div>
        <div class="ui three wide column">
            <h3 class="ui header center aligned segment">Derniers avis</h3>
            <?php while ($row = $avis->fetchObject()): ?>
                <h4 class="ui header"><?=$row->username?></h4>
                <div class="ui one stackable grid vertical segment">
                <a href="?page=catalogue&id=<?=$row->id?>&order=datePub"><?=$row->title?></a>
                <p>Commentaire:</p>
                <p><?=$row->text?></p>
                </div>
            <?php endwhile; ?>
        </div>
</div>

        <!-- Affichage Meilleure ventes -->

        <?php

        $sql = "SELECT id, prix, imgSmall, quantitySold, view
            FROM jeux
            WHERE `view` = 1
            ORDER BY quantitySold DESC
            LIMIT 4";
        $affichagejeux = $dbh->prepare($sql);
        $affichagejeux->execute();
        ?>

        <div class="three column row">
            <div class="three wide column"></div>
                <div class="ten wide column "><h3 class="ui header center aligned segment">Meilleures ventes</h3>
                    <ul>
                        <?php $i=1; ?>
                        <?php while ($affichage = $affichagejeux->fetchObject()): ?>
                            <li class="jeuglobal" data-id="el<?= $affichage->id ?>">
                                <div class="jeuContent">
                                    <ul>
                                        <li><img class="circleicon" src="img/icons/search.svg"><img
                                                src="img/imgjeux/<?= $affichage->imgSmall ?>" height="150" width="100"></li>
                                        <li class="placement">
                                            <ul class="placement-prix">
                                                <li class="priceText"><?= $affichage->prix ?>€</li>
                                                <li class="mini ui vertical animated button buybutton" tabindex="0">
                                                    <div class="hidden content"><a href="?page=addpanier&id=<?= $affichage->id ?>">Acheter</div></a>
                                                    <div class="visible content">
                                                        <i class="shop icon"></i>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>

        <?php

        //Affichage "News page accueil" -------------

        $sql = "SELECT id, title, img, content, datePub, `time`, `view`
            FROM news
            WHERE `view` = 1
            ORDER BY datePub DESC
            LIMIT 2";
        $affichagenews = $dbh->prepare($sql);
        $affichagenews->execute();

        ?>

        <div class="three column row">
            <div class="thirteen wide column"><h3 class="ui header center aligned segment">News</h3>
                <?php while ($news = $affichagenews->fetchObject()): ?>
                    <div class="ui grid vertical segment">
                        <div class="three wide column">
                            <img class="ui top aligned small image" src="img/imgNews/<?= $news->img ?>">
                        </div>
                        <div class="thirteen wide column">
                            <h4 class="ui header"><?= $news->title ?> </h4>
                            <h5 class="ui header"><?= $news->datePub ?></h5>
                            <h5 class="ui header"><?= $news->time ?></h5>

                            <p><?= $cutText->cutString($news->content, $news->id)?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
</div>
    </main>

<?php }
include "includes/catalogue.php";

//Page "News" -------------
if($_GET['page'] == 'news') {
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql = "SELECT id, title, img, content, datePub, `time`, `view`
       FROM news
       WHERE `view` = 1 AND id NOT IN ('$id')
       ORDER BY datePub DESC";
}
else{
    $sql = "SELECT id, title, img, content, datePub, `time`, `view`
       FROM news
       WHERE `view` = 1
       ORDER BY datePub DESC";
}
$affichagenews = $dbh->prepare($sql);
$affichagenews->execute();
?>
    <div class="ui container">
        <div class="ui grid">
                <div class="ui two column stackable grid">
                    <div class="two column row">
                <?php require "includes/formlogin.php"; ?>
                <div class="thirteen wide column"><h3 class="ui header center aligned segment">News</h3>
<?php

if ($_GET['page'] == 'news' && isset($_GET['id'])) {
    $sql = "SELECT id, title, img, content, datePub, `time`, `view`
              FROM news
              WHERE id = :id";
    $result = $dbh->prepare($sql);
    $result->execute(['id' => $_GET['id']]);
    $news = $result->fetchObject();
    ?>
                    <div class="ui two stackable grid vertical segment">
                        <div class="three wide column">
                            <img class="ui centered small image" style="border-style: solid; border-radius:10px; border-width:5px; border-color: #ffffff;" src="img/imgnews/<?=$news->img?>">
                        </div>
                        <div class="thirteen wide column">
                            <h4 class="ui header"><?=$news->title?></h4>
                            <p><?=$news->content?></p>
                        </div>

                    </div>
    <?php require "includes/comments.php";?>
<?php
}
?>
                    <?php while ($news = $affichagenews->fetchObject()): ?>
                    <div class="ui two stackable grid vertical segment">
                            <div class="three wide column">
                                <img class="ui centered small image" src="img/imgNews/<?= $news->img ?>">
                            </div>
                            <div class="thirteen wide column">
                                <h4 class="ui header"><?= $news->title ?> </h4>
                                <h5 class="ui header"><?= $news->datePub ?></h5>
                                <h5 class="ui header"><?= $news->time ?></h5>

                                <p><?= $cutText->cutString($news->content, $news->id)?></p>
                            </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
<?php
}

//Page Nos services -----------

elseif($_GET['page'] == 'service') {
    $sql = "SELECT content from pages WHERE slug = 'Service'";
    $res = $dbh->prepare($sql);
    $res->execute();
    $content = $res->fetchobject();
?>
    <div class="ui container">
        <div class="ui grid">
            <div class="ui two column stackable grid">
                <?php require "includes/formlogin.php"; ?>
                <div class="twelve wide column">
                    <div class="ui left aligned segment">
                        <h1>Services et en vente</h1>
                        <?= $content->content ?>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

<?php

}

//Page Support ---------
elseif($_GET['page'] == 'support') {
    require "includes/formSupport.php";
}
require "includes/footer.inc.php";


?>
