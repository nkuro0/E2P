<div class="ui two column stackable grid">
<?php
$id = $_SESSION['auth']->id;
$sql = "SELECT num_commande, ROUND(SUM(prix_unitaire*quantity), 2) AS total, SUM(quantity) AS quantity_total, DATE_FORMAT(dateAchat,'%d-%m-%Y') AS dateA, TIME_FORMAT(timeAchat, '%h:%i') AS timeA
FROM panier
WHERE user_id = $id
GROUP BY num_commande, timeAchat, dateAchat";
$result = $dbh->prepare($sql);
$result->execute();


?>
        <?php require_once "includes/formlogin.php";?>

    <div class="thirteen wide column">
        <div class="ui header center aligned green segment"><h4>Commandes</h4></div>
        <table class="ui fixed table">
            <thead>
            <tr><th class="ui center aligned">N° de commande</th>
                <th class="ui center aligned">Date</th>
                <th class="ui center aligned">Heure</th>
                <th class="ui center aligned">Quantité total</th>
                <th class="ui center aligned">Total de la commande</th>
                <th class="ui center aligned">Détail</th>
            </tr></thead>
            <tbody>
            <?php while($row = $result->fetchobject()):?>
            <tr>
                <td class="ui center aligned"><?= $row->num_commande?></td>
                <td class="ui center aligned"><?= $row->dateA?></td>
                <td class="ui center aligned"><?= $row->timeA?></td>
                <td class="ui center aligned"><?= $row->quantity_total?></td>
                <td class="ui center aligned"><?= $row->total?>€</td>
                <td class="ui center aligned"><a href="?page=commande&id=<?= $row->num_commande?>"><i class="large search icon"></i></a></td>
            </tr>
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



