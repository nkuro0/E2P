<div class="ui two column stackable grid">
    <div class="two column row">

<?php
include "formlogin.php";
if(empty($_SESSION['panier'])) {
    echo "<h5 class='ui header'>Votre panier est vide</h5>";
    }
    elseif (!empty($_SESSION['panier'])) {
        $ids = array_keys($_SESSION['panier']);
        $sql = 'SELECT *
            FROM jeux
            WHERE `view` = 1 AND id IN (' . implode(',', $ids) . ')
            ';
        $req = $dbh->prepare($sql);
        $req->execute();
        ?>

                <div class="thirteen wide column">
                <table class="ui celled padded table">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="center aligned">Jeu</th>
                        <th class="center aligned">Prix <small>(Unitaire)</small></th>
                        <th class="center aligned">quantité</th>

                        <th></th>
                    </tr>
                    </thead>
                    <form method="post" action="panier.php">
                    <tbody>
                    <?php while ($jeupanier = $req->fetchObject()): ?>
                        <?php $quantity = $_SESSION['panier'][$jeupanier->id]; ?>
                        <?php $total[] = $jeupanier->prix * $quantity; ?>
                        <tr>
                            <td class="center aligned">
                                <img class="ui tiny image" src="img/imgjeux/<?= $jeupanier->imgSmall ?>">
                            </td>
                            <td class="center aligned">
                                <p><?= $jeupanier->title ?></p>
                            </td>

                            <td class="center aligned">
                                <p class="prix"><b><?= $jeupanier->prix ?></b>€</p>
                            </td>
                            <td class="center aligned">
                                <p><?= $quantity ?></p>
                            </td>
                            <td class="center aligned">
                                <a href="?page=delpanier&id=<?= $jeupanier->id ?>"><i class="large trash icon"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endwhile; ?>
                    <tbody>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="center aligned">Prix Total</th>
                        <td class = 'center aligned'><?= array_sum($total) ?> €</td>
                    </tr>
                    </tbody>
                    </form>
                </table>
                    <?php if(!isset($_SESSION['auth'])): ?>
                        <div class="ui segment center aligned">
                            <h5>Vous ne pouvez pas faire de paiement si vous n'êtes pas connecté</h5>
                        </div>
                    <?php else:?>
                    <a href="actions/dumpPanier.php"><div class="ui fluid large teal submit button">Paiement</div></a>
                    <?php endif?>
                </div>


    <?php } ?>
    </div>
</div>


