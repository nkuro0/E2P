<div class="ui two column stackable grid">
    <div class="two column row">

<?php
include "formlogin.php";
if(empty($_SESSION['panier'])) {
    echo "<div class='thirteen wide column'><div class='ui center aligned red segment'><h4 class='ui header'>Votre panier est vide</h4></div>";
    }
    elseif (!empty($_SESSION['panier'])) {
        $ids = array_keys($_SESSION['panier']);
        $sql = 'SELECT *
            FROM jeux
            WHERE `view` = 1 AND id IN (' . implode(',', $ids) . ')
            ';
        $req = $dbh->prepare($sql);
        $req->execute();
        $nbrProduits = count($_SESSION['panier']);
        $i = 1;
        ?>

        <div class="thirteen wide column">
                <table class="ui celled padded table">
                    <thead>
                    <tr>
                        <th></th>
                        <th class="center aligned">Jeu</th>
                        <th class="center aligned">Prix <small>(Unitaire)</small></th>
                        <th class="center aligned">quantité</th>
                        <th class="center aligned">total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <form method="post" action="actions/dumpPanier.php">
                    <tbody class="basket">
                    <?php while ($jeupanier = $req->fetchObject()): ?>
                        <?php $quantity = $_SESSION['panier'][$jeupanier->id]; ?>
                        <?php $total[] = $jeupanier->prix * $quantity; ?>
                        <tr id="basketElem-<?=$i++?>">
                            <td class="center aligned">
                                <img class="ui tiny image" src="img/imgjeux/<?= $jeupanier->imgSmall ?>">
                            </td>
                            <td class="center aligned">
                                <div class="ui input">
                                    <p><?= $jeupanier->title ?></p>
                                </div>
                            </td>
                            <?php if(isset($_SESSION['auth'])): ?>
                            <input type="hidden" name="idUser" value="<?=$_SESSION['auth']->id?>">
                            <?php endif ?>
                            <input type="hidden" name="id[]" value="<?=$jeupanier->id?>">
                            <input type="hidden" name="numCommande" value="<?=time()?>">
                            <input type="hidden" name="nomJeux[]" value="<?=$jeupanier->title?>">
                            <td class="center aligned">
                                <div class="ui input">
                                    <input name="prixobjet[]" style="width: 80px" type="text" value="<?= $jeupanier->prix ?>" readonly="readonly">
                                </div>
                            </td>
                            <td class="nbr center aligned">
                                <input name="quantite[]" id="qty1" style="width: 80px" type="number" value="<?=$quantity?>" class="qty"/>
                            </td>
                            <td class='sumprice'><b><?=$jeupanier->prix?></b>€
                                <input type="hidden" name='prixUnitaire' value='<?=$jeupanier->prix?>'>
                            </td>
                            <td class="center aligned">
                                <a href="?page=delpanier&id=<?= $jeupanier->id ?>"><i class="large trash icon"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>

                    <tbody>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="center aligned">Prix Total</th>
                        <td class ='center aligned'>
                            <div class="ui input">
                                <b class='totalprice'><?= array_sum($total)?></b>
                            </div>€
                        </td>
                    </tr>
                    </tbody>
                </table>
                    <?php if(!isset($_SESSION['auth'])): ?>
                        <div class="ui segment center aligned">
                            <h5>Vous ne pouvez pas faire de paiement si vous n'êtes pas connecté</h5>
                        </div>
                    <?php else:?>
                        <button type="submit" class="ui fluid large teal submit button">Paiement</button>
                    <?php endif?>
                    </form>
                </div>

    <?php } ?>
        <?php
        if(isset($_SESSION['errorPanier']) && !$_SESSION['errorPanier'] == ""):?>
            <div class="ui secondary inverted center aligned red segment"><h4 class="ui header">Vous excédez la limite de stock pour ce produit : <?=$_SESSION['errorPanier']?></h4></div>
            <?php unset($_SESSION['errorPanier']) ?>
        <?php elseif(isset($_SESSION['validPanier']) && !$_SESSION['validPanier'] == ""): ?>
            <div class="ui secondary inverted center aligned green segment">
                <h4 class="ui header"><?=$_SESSION['validPanier']?></h4>
            </div>
            <?php unset($_SESSION['validPanier']) ?>
        <?php endif; ?>
    </div>
</div>


