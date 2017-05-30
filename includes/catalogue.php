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
                $sql = "SELECT jeux.id, jeux.title, jeux.prix, jeux.quantity, jeux.datePub, jeux.imgSmall, DATE_FORMAT(datePub, '%d-%m-%y') AS `date`, jeux.description, avis_jeux.text, avis_jeux.avis_user_id, avis_jeux.avis_jeux_id, avis_join.avis_eval, users.username
                FROM jeux 
                INNER JOIN avis_jeux ON avis_jeux.avis_jeux_id = jeux.id 
                INNER JOIN users ON users.id = avis_jeux.avis_user_id 
                INNER JOIN avis_join ON avis_join.avis_id = avis_jeux.id
                WHERE jeux.id = :id";
                $result = $dbh->prepare($sql);
                $result->execute(['id' => $_GET['id']]);
                $jeux = $result->fetchObject();
                $result4 = $dbh->prepare($sql);
                $result4->execute(['id' => $_GET['id']]);
                $sql2 = "SELECT *
                FROM categorie
                LEFT JOIN cat_join  
                ON cat_join.categorie_id = categorie.id
                LEFT JOIN jeux
                ON cat_join.jeux_id = jeux.id
                WHERE jeux.id = :jeux_id";
                $result2 = $dbh->prepare($sql2);
                $result2->execute(['jeux_id' => $_GET['id']]);
                $sql3 = "SELECT text, avis_user_id FROM avis_jeux WHERE avis_user_id=? AND avis_jeux.avis_jeux_id =?";
                $result3 = $dbh->prepare($sql3);
                $result3->execute([$_SESSION['auth']->id, $_GET['id']]);
                $commentUser = $result3->fetchObject();
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
                                if ($i <= 3): ?>
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

                            <?php while($jeux=$result4->fetchObject()):?>
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
                                            <?php else:?>
                                                <i class="empty star icon"></i>
                                            <?php endif;?>
                                        <?php endfor;?>
                                    </div>

                                </div>
                            <?php endwhile; ?>
                        </div>

                        <?php if(!empty($_SESSION['auth'])):?>
                            <?php if(isset($_SESSION['allUsers']))
                            {
                                if(in_array($_SESSION['auth']->username, $_SESSION['allUsers'])){
                                    $commentsPosted=false;
                                }
                            }
                            else {
                                $commentsPosted=true;
                            }?>
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
                                <textarea id="edit" name="edit"><?php
                                    if(isset($commentUser->text)){
                                    echo $commentsPosted ? $commentUser->text : '';
                                    }?></textarea>
                            </label>
                            <?php if(!$commentsPosted): ?>
                            <input type="hidden" name="avis_exist" value="update">
                            <?php endif; ?>
                            <input class="ui single blue button" type="submit" id="envoyer" value="Envoyer"/>
                        </form>

                        <?php endif; ?>
                        <?php if(empty($_SESSION['auth'])):?>
                            <h4 class="ui header">Veuillez vous connectez pour laisser votre avis</h4>
                        <div class="ui grid inscription">
                            <div class="four wide column">
                                <a href="?page=inscription" class="ui fluid large teal submit button">Inscription</a>
                            </div>
                        </div>
                        <?php endif ?>
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
                ORDER BY datePub DESC";

            }
            elseif(isset($_GET['tri'])){
                switch($_GET['tri']){
                    case 'prix':
                        $sql = "SELECT * FROM jeux ORDER BY prix ASC";
                        break;
                    case 'date':
                        $sql = "SELECT * FROM jeux ORDER BY datepub DESC";
                        break;
                }
            }
            else{
                $sql = "SELECT jeux.id AS id, jeux.imgSmall, jeux.title, jeux.quantity, jeux.prix, jeux.description FROM jeux 
            ORDER BY datePub DESC";
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
            <?php while($jeux=$affichagecatalogue->fetchObject()):?>

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
                        <?php $avgEval = explode(',',$jeux->avgEval);
                        $moyenne = array_sum($avgEval)/count($avgEval);?>
                        <?php for($i = 1; $i<= 5; $i++):?>
                            <?php if($i <= $moyenne):?>
                                <i class="star icon"></i>
                            <?php else:?>
                                <i class="empty star icon"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
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
        <?php endif; ?>

