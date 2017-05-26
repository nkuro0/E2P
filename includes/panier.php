<div class="container">
    <div class="ui grid">

<?php
include "formlogin.php";
if(empty($_SESSION['panier'])) {
    echo "<p>Votre panier est vide</p>";
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

// Loading button
<script>
    // Loading button
    $('button.load-more-reviews').on('click', function (e) {
        e.preventDefault();
        var _this = $(this);
        var product_id = _this.data('product-id');
        var limit = _this.data('limit');
        var _btn_text = _this.html();
        _this.attr('disabled', true);
        $.ajax({
            type: 'POST',
            url: 'actions/ajax.php',
            data: {
                action: 'fetch_reviews',
                product_id: product_id,
                limitcount: limit
            },
            dataType: 'json',
            beforeSend: function () {
                _this.html('<img src="img/loader/ajax-loader.gif" /> &nbsp; Loading...')
            },
            success: function (r) {
                window.setTimeout(function () {
                    _this.html(_btn_text);
                    _this.attr('disabled', false);
                    console.log(r);
                    _this.data('limit', r['limit']);
                    if (r['status'] == '1') {
                        $('div.reviews-block').append(r['html']);
                    } else if (r['status'] == '2') {
                        _this.hide();
                    }
                    return false
                }, 3000);
            }
        });
    });
</script>

