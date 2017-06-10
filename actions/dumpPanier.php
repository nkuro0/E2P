<?php
session_start();
require '../includes/config.inc.php';
spl_autoload_register(function($class) {
    require '../lib/'.$class.'.php';
});
$dbh = DB::getInstance();
$_SESSION['errorPanier'] = "";
$_SESSION['validPanier'] = "";
var_dump($_POST);

$nbrProducts = count($_POST['id']);
$stockEmpty = 0;
$stockTooSmall = 0;
$game = [];
for($i = 0; $i < $nbrProducts; $i++){
    $quantite = $_POST['quantite'][$i]*1;
    $sql = "SELECT title, quantity, quantitySold FROM jeux WHERE id= :id";
    $result = $dbh->prepare($sql);
    $result->execute([
        'id' => $_POST['id'][$i]
    ]);
    $row = $result->fetchobject();
    if($row->quantity <= 0 ){
        $stockEmpty++;
        $game[] = $row->title;

    }
    elseif($row->quantity<$quantite){
        $stockTooSmall++;
        $game[] = $row->title;
    }
}

if($stockEmpty == 0){
    if($stockTooSmall == 0){
        for ($i = 0; $i < $nbrProducts; $i++) {
            $sql2 = "SELECT quantity, quantitySold FROM jeux WHERE id= :id";
            $result2 = $dbh->prepare($sql2);
            $result2->execute([
                'id' => $_POST['id'][$i]
            ]);
            $row = $result2->fetchobject();

            $initialQuantity = $row->quantity;
            $initialQuantitySold = $row->quantitySold === null ? 0 : $row->quantitySold;

            $sql = "INSERT INTO panier (user_id, jeux_id, prix_unitaire, quantity, dateAchat, timeAchat, num_commande) VALUES (:userId, :jeuxId, :prixUnit, :quantity, CURDATE(), CURTIME(), :num_commande)";
            $result = $dbh->prepare($sql);
            $result->execute([
                'userId' => $_POST['idUser'],
                'jeuxId' => $_POST['id'][$i],
                'prixUnit' => $_POST['prixobjet'][$i],
                'quantity' => $_POST['quantite'][$i],
                'num_commande' => $_POST['numCommande']
            ]);

            $sql3 = "UPDATE jeux SET quantity=:quantity, quantitySold=:quantitySold WHERE jeux.id = :jeuxId";
            $result3 = $dbh->prepare($sql3);
            $result3->execute([
                'quantity' => $initialQuantity - $_POST['quantite'][$i],
                'quantitySold' => $initialQuantitySold + $_POST['quantite'][$i],
                'jeuxId' => $_POST['id'][$i]
            ]);
        }
    }
    else{
        $_SESSION['errorPanier'] = "Vous excédez la limite de stock pour ce produit ".isset($game) ? implode(', ',$game) : '';
        header('location:' .$_SERVER['HTTP_REFERER']);
    }
}
else {
    $_SESSION['errorPanier'] = "Il n'y à plus ce type de produits ".isset($game) ? implode(', ',$game) : '';
    header('location:' .$_SERVER['HTTP_REFERER']);
}
$_SESSION['validPanier'] = "Merci pour votre achat";
unset($_SESSION['panier']);
header('location:' .$_SERVER['HTTP_REFERER']);
?>