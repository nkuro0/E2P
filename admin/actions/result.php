<?php
require '../includes/config.inc.php';
spl_autoload_register(function ($class) {
    require '../lib/'.$class.'.php';
});

$dbh = DB::getInstance();

if(isset($_GET['motclef'])){
    $motclef = $_GET['motclef'];
    $q = array('motclef'=>$motclef. '%');
    $sql = "SELECT id, title, prix FROM jeux WHERE title like :motclef";
    $req = $dbh->prepare($sql);
    $req->execute($q);
    $count = $req->rowCount($sql);

    if($count >= 1){
        while ($result = $req->fetch(PDO::FETCH_OBJ)){
            echo "
           
        <a href='?page=catalogue&id=".$result->id."&order=datePub'>
            <h5 class='ui header search element'>".$result->title." &nbsp&nbspPrix : ".$result->prix." €</h5>
        </a>
       
  ";
        }
    }
    else{
        echo "Aucun produits trouvé";
    }
}
