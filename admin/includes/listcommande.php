<?php
$sql = "SELECT users.username, panier.user_id, num_commande, ROUND(SUM(prix_unitaire*quantity), 2) AS total, SUM(quantity) AS quantity_total, DATE_FORMAT(dateAchat,'%d-%m-%Y') AS dateA, TIME_FORMAT(timeAchat, '%h:%i') AS timeA
FROM panier
INNER JOIN users ON users.id = panier.user_id
GROUP BY num_commande, timeAchat, dateAchat, user_id, username";
$result = $dbh->prepare($sql);
$result->execute();
if(isset($_GET['order'])){
    $rightSql = "SELECT users.username, panier.user_id, num_commande, ROUND(SUM(prix_unitaire*quantity), 2) AS total, SUM(quantity) AS quantity_total, DATE_FORMAT(dateAchat,'%d-%m-%Y') AS dateA, TIME_FORMAT(timeAchat, '%h:%i') AS timeA
FROM panier
INNER JOIN users ON users.id = panier.user_id
";
    $tri_autorises = array('num_commande','username', 'dateA', 'timeA', 'quantity_total', 'total');
    $order_by = in_array($_GET['order'],$tri_autorises) ? $_GET['order'] : 'num_commande';
    $order_dir = isset($_GET['inverse']) ? 'DESC' : 'ASC';
    $sql = $rightSql.' GROUP BY num_commande, timeAchat, dateAchat, user_id, username ORDER BY '.$order_by.' '.$order_dir;
}
$result = $dbh->query($sql);
?>


<h3>Gestion des commandes</h3>
<div class="thirteen wide column">
    <table class="ui fixed table">
        <thead>
        <tr><th class="ui center aligned"><?php echo sort_link('commande&order=','N° de commande', 'num_commande') ?></th>
            <th class="ui center aligned"><?php echo sort_link('commande&order=','User', 'username') ?></th>
            <th class="ui center aligned"><?php echo sort_link('commande&order=','Date', 'dateA') ?></th>
            <th class="ui center aligned"><?php echo sort_link('commande&order=','Heure', 'timeA') ?></th>
            <th class="ui center aligned"><?php echo sort_link('commande&order=','Quantité total', 'quantity_total') ?></th>
            <th class="ui center aligned"><?php echo sort_link('commande&order=','Total', 'total') ?></th>
            <th class="ui center aligned">Détail</th>
            <th class="ui center aligned">Supprimer</th>
        </tr></thead>
        <tbody>
        <?php while($row = $result->fetchobject()):?>
            <tr>
                <td class="ui center aligned"><?= $row->num_commande?></td>
                <td class="ui center aligned"><?= $row->username?></td>
                <td class="ui center aligned"><?= $row->dateA?></td>
                <td class="ui center aligned"><?= $row->timeA?></td>
                <td class="ui center aligned"><?= $row->quantity_total?></td>
                <td class="ui center aligned"><?= $row->total?>€</td>
                <td class="ui center aligned"><a href="?page=commande&id=<?= $row->num_commande?>"><i class="large search icon"></i></a></td>
                <td class="ui center aligned"><a href="#deletepost-<?=$row->num_commande?>" data-toggle="modal" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a></td>
            </tr>
            <div id="deletepost-<?=$row->num_commande?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
                            <a href="?page=delcommande&id=<?=$row->num_commande?>" type="submit" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        </tbody>
    </table>

    <?php if(isset($_GET['id'])): ?>
        <?php if($_GET['id']): ?>
            <h4>Numéro de commande : <?= $_GET['id'] ?></h4>
            <?php
            $sql = "SELECT num_commande, panier.quantity, panier.prix_unitaire, jeux.title, (panier.quantity*panier.prix_unitaire) AS prixU FROM panier INNER JOIN jeux ON jeux.id = panier.jeux_id WHERE panier.num_commande = :id";
            $result = $dbh->prepare($sql);
            $result->execute(['id' => $_GET['id']]);
            ?>
            <table class="ui fixed table">
                <thead>
                <tr><th class="ui center aligned">Nom</th>
                    <th class="ui center aligned">Quantité</th>
                    <th class="ui center aligned">Prix unitaire</th>
                    <th class="ui center aligned">Total prix unitaire</th>
                </tr></thead>
                <tbody>
                <?php while($row = $result->fetchobject()):?>
                    <tr>
                        <td class="ui center aligned"><?= $row->title?></td>
                        <td class="ui center aligned"><?= $row->quantity?></td>
                        <td class="ui center aligned"><?= $row->prix_unitaire?>€</td>
                        <td class="ui center aligned"><?= $row->prixU?>€</td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>
</div>



