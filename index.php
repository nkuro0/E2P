<?php

require "includes/header.inc.php";

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


// Page d'accueil -----------------
if($_GET['page'] == 'accueil') {
    require "includes/slider.inc.php";
    var_dump($_GET);
    ?>

    <div class="ui container">
    <div class="ui two row stackable grid">
        <div class="three column row">

<?php
require "includes/formlogin.php";

//Affichage "Maintenant disponible" --------------

    $sql = "SELECT id, title, quantity, description, prix, imgSmall, DATE_FORMAT(datePub, '%d/%m/%y') AS `date`
            FROM jeux
            WHERE `view` = 1
            ORDER BY date ASC ";
    $affichagejeux = $dbh->prepare($sql);
    $affichagejeux->execute();
    ?>
            <!-- Affichage Maintenant disponible -->
<div class="ui ten wide column "><h3 class="ui header center aligned segment">Maintenant disponible</h3>
                <ul>

                    <?php $i=1; ?>
                    <?php while ($affichage = $affichagejeux->fetchObject()): ?>
                        <li class="jeuglobal" data-id="el<?= $affichage->id ?>">
                            <div class="jeuContent">
                                <ul>
                                    <li><img class="circleicon" src="img/icons/circle.svg"><img class="imgjeux"
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
                                    <div class="ui positive right labeled icon button">
                                        <a class="buyModal" href="?page=addpanier&id=<?= $affichage->id ?>">Acheter</a>
                                        <i class="checkmark icon"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php $i++ ?>
                    <?php endwhile; ?>

                </ul>
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
                                        <li><img class="circleicon" src="img/icons/circle.svg"><img
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

<?php
//Page Catalogue --------
} ?>
<?php if($_GET['page'] == 'catalogue'):?>
    <div class="ui container">
        <div class="ui two column stackable grid">
            <div class="two column row">
    <?php require_once "includes/formlogin.php";?>
    <?php
        $sql="SELECT * FROM categorie";
        $result = $dbh->prepare($sql);
        $result->execute();
    ?>
        <div class="three wide column">

        </div>
    </div>

    <div class="thirteen wide column">
           <h3 class="ui header center aligned segment">Jeux</h3>

<!– Affichage d'un seul jeu –>

    <?php if(isset($_GET['id'])) {
        $sql = "SELECT *, DATE_FORMAT(datePub, '%d-%m-%y') AS `date`
                FROM jeux
                LEFT JOIN avis_jeux
                ON avis_jeux.jeux_id = jeux.id
                LEFT JOIN users
                ON users.id = avis_jeux.user_id
                WHERE jeux.id = :id";
        $result = $dbh->prepare($sql);
        $result->execute(['id' => $_GET['id']]);
        $jeux = $jeux = $result->fetchObject();
        $sql2 = "SELECT *
                FROM categorie
                LEFT JOIN cat_join  
                ON cat_join.categorie_id = categorie.id
                LEFT JOIN jeux
                ON cat_join.jeux_id = jeux.id
                WHERE jeux.id = :jeux_id";
        $result2 = $dbh->prepare($sql2);
        $result2->execute(['jeux_id' => $_GET['id']]);
        ?>

        <div class="ui vertical segment">
            <div class="ui two column stackable grid">
                <div class="thirteen wide column">
                    <h4 class="ui header"><?=$jeux->title?></h4>
                    <h5 class="ui header"><?=$jeux->prix?>€</h5>
                    <h5 class="ui header">Genre :
                        <?php while ($jeux2 = $result2->fetchObject()): ?>
                            <b><?= $jeux2->tags ?> | </b>
                        <?php endwhile; ?>
                    </h5>
                    <?php if ($jeux->quantity > 0): ?>
                        <h5 class="ui header" style="color: rgba(145, 222, 110, 1)">En stock</h5>
                    <?php else: ?>
                        <h5 class="ui header" style="color: rgba(179, 25, 38, 1)">Hors stock</h5>
                    <?php endif; ?>
                    <h5 class="ui header">Date de sortie : <?= $jeux->date ?></h5>
                    <?php for ($i = 1; $i <= 5; $i++):
                        if ($i <= $jeux->eval): ?>
                            <i class="star icon"></i>
                        <?php else: ?>
                            <i class="empty star icon"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <div class="three wide column">
                    <img class="ui top aligned huge image"
                         style="border-style: solid; border-radius:5px; border-width:5px;"
                         src="img/imgjeux/<?=$jeux->imgSmall?>">
                    <a class="ui single blue button" href="?page=addpanier&id=<?= $jeux->id?>">Acheter</a>
                </div>
            </div>


            <div class="ui top attached tabular menu">
                <a class="item active" data-tab="first">Description</a>
                <a class="item" data-tab="second">Vidéo | Gallerie</a>
                <a class="item" data-tab="third">Avis</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="first"><p><?=$jeux->description?></p></div>
            <div class="ui bottom attached tab segment" data-tab="second">
                <div class="video-gallery">
                    <iframe src="https://www.youtube.com/embed/KrXrk1ntTCc" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="ui bottom attached tab segment" data-tab="third">
                <div class="ui four cards">
                <?php while($jeux = $result->fetchObject()): ?>
                    <div class="card">
                        <div class="content">
                            <div class="header"><?=$jeux->username?></div>
                            <div class="description"><p><?=$jeux->text?></p></div>
                        </div>
                            <div class="extra content">
                                Rating:
                                <?php for ($i = 1; $i <= 5; $i++):
                                    if ($i <= $jeux->avis_eval): ?>
                                        <i class="star icon"></i>
                                    <?php else: ?>
                                        <i class="empty star icon"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>

                    </div>
                <?php endwhile; ?>
                </div>
                <form id="form-avis" action="actions/addAvis.php" method="post">
                    <div class="ui two stackable grid">
                        <div class="three wide column">
                            <input type="hidden" name="userId" value="<?= $_SESSION['auth']->id ?>">
                            <input type="hidden" name="jeuxId" value="<?= $_GET['id'] ?>">
                            <h4>Evaluation</h4>
                            <label for="eval">
                                <select name="eval" class="ui fluid dropdown">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <h4>Commentaire</h4>
                    <label for="edit">
                        <textarea id="edit" name="edit"></textarea>
                    </label>
                    <input class="ui single blue button" type="submit" id="envoyer" value="Envoyer"/>
                </form>
            </div>
        </div>

        <?php
    }

//Affichage de tout les jeux -----
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT *
        FROM jeux
        WHERE id NOT IN ('$id')
            ORDER BY datePub DESC
            LIMIT 8";
    }
    elseif(isset($_GET['tri'])){
        switch($_GET['tri']){
            case 'prix':
                $sql = "SELECT * FROM jeux ORDER BY prix ASC";
                break;
            case 'date':
                $sql = "SELECT * FROM jeux ORDER BY datepub DESC";
                break;
            case 'eval':
                $sql = "SELECT * FROM jeux ORDER BY eval DESC";
                break;
        }
    }
    else{
        $sql = "SELECT *
        FROM jeux
            ORDER BY datePub DESC
            LIMIT 8";
    }
    $affichagecatalogue = $dbh->prepare($sql);
    $affichagecatalogue->execute();
?>
        <div class="ui text menu">
            <div class="header item">Trier par</div>
            <a class="item active" href="?page=catalogue&tri=prix">
                Prix
            </a>
            <a class="item" href="?page=catalogue&tri=date">
                Date de sortie
            </a>
            <a class="item" href="?page=catalogue&tri=eval">
                Evaluation
            </a>
        </div>
                <?php while($jeux =$affichagecatalogue->fetchObject()):?>

                        <div class="ui two stackable grid vertical segment">
                            <div class="three wide column">
                                <a href="?page=catalogue&id=<?=$jeux->id?>"><img class="circleiconcat" src="img/icons/circle.svg"></a>
                                <img class="ui centered small image" src="img/imgjeux/<?=$jeux->imgSmall?>">
                            </div>
                            <div class="thirteen wide column">
                                <h4 class="ui header"><?=$jeux->title?> </h4>
                                <?php if($jeux->quantity>0) {
                                echo '<h5 class="ui header" style="color: rgba(145, 222, 110, 1)">En stock</h5>';
                                }
                                else {
                                echo '<h5 class="ui header" style="color: rgba(179, 25, 38, 1)">Hors stock</h5>';
                                }?>
                                <h5 class="ui header"><?=$jeux->prix?> €</h5>

                                <?php for($i = 1; $i<= 5; $i++):?>
                                    <?php if($i <= $jeux->eval):?>
                                        <i class="star icon"></i>
                                    <?php else:?>
                                        <i class="empty star icon"></i>
                                    <?php endif?>
                                <?php endfor?>
                                <p><?=$cutText->cutString2($jeux->description, $jeux->id)?></p>
                                <a class="ui blue button" href="?page=addpanier&id=<?=$jeux->id?>">Acheter</a>
                            </div>
                        </div>

                <?php endwhile;?>

            </div>


<?php
    echo '    </div>
            </div>
        </div>
        </div>';
    ?>
// Affichage de la pagination
<?php endif; ?>


<?php
//Page "News" -------------
if($_GET['page'] == 'news') {
    $sql = "SELECT id, title, img, content, datePub, `time`, `view`
       FROM news
       WHERE `view` = 1
       ORDER BY datePub DESC";
$affichagenews = $dbh->prepare($sql);
$affichagenews->execute();
?>
    <div class="ui container">
        <div class="ui grid">
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
                    <div class="ui grid vertical segment" style="background-color: rgba(0, 0, 0, 0.03); border-radius: 25px">
                        <div class="three wide column">
                            <img class="ui top aligned huge image" style="border-style: solid; border-radius:10px; border-width:5px; border-color: #ffffff;" src="img/imgnews/<?=$news->img?>">
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
    </div>

<?php
}

//Page Nos services -----------

elseif($_GET['page'] == 'Service') {
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