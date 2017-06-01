<?php

require '../../includes/config.inc.php';
spl_autoload_register(function ($class) {
    require '../../lib/'.$class.'.php';
});
require_once '../lib/check_img.php';
$check_img = new Check_img();
$dbh = DB::getInstance();
$imgExt = str_replace('image/', '.', $_FILES['image']['type']);
if ($imgExt == '.jpeg'){
    $imgExt = '.jpg';
}
$basename = basename($_FILES['image']['name'], $imgExt);
if(isset($_POST)){

$check = $check_img->check($_FILES['image']);
    if($check===true){

        $fichier = $check_img->upload($basename, $_FILES['image']);
        $title = strip_tags(($_POST["title"]));
        $prix = floatval($_POST["prix"]);
        if(isset($_POST['categorie'])){
            $category = $_POST['categorie'];
        }
        $quantity = intval($_POST['quantity']);
        $description = strip_tags($_POST['description']);
        $view = strip_tags($_POST['view']);
        $idAdmin = intval($_POST['id-admin']);
        $evalAdmin = intval($_POST['eval-admin']);
        $date = $_POST['date'];
        $error = '';


        if(strlen($title)<3){
            $error.='Le titre doit être supérieur à 3 caractère';
        }
        if(strlen($title)>100){
            $error.='Le titre doit être inférieur à 50 caractère';
        }

        if($error==''){
            $sql = "INSERT INTO jeux (title, prix, datePub, imgSmall, quantity, description, view)  VALUES ('$title', '$prix', '$date', '$fichier', '$quantity', '$description', '$view')";
            $result = $dbh->prepare($sql);
            $result->execute();
            $jeuxInsertedId = $dbh->lastInsertId();
            foreach($category as $val){
                $sql2 = "INSERT INTO cat_join (jeux_id, categorie_id) VALUES ('$jeuxInsertedId', '$val')";
                $result2 = $dbh->prepare($sql2);
                $result2->execute();
            }
            $sql = "INSERT INTO avis_jeux (avis_jeux_id, avis_user_id) VALUES ('$jeuxInsertedId', '$idAdmin')";
            $result = $dbh->prepare($sql);
            $result->execute();
            $avisJeuxInsertedId = $dbh->lastInsertId();
            $sql = "INSERT INTO avis_join (jeux_id, user_id, avis_id, avis_eval) VALUES('$jeuxInsertedId', '$idAdmin','$avisJeuxInsertedId', '$evalAdmin')";
            $result = $dbh->prepare($sql);
            $result->execute();
            header('location: ../index.php?page=jeux');
        }
        else{
            echo $error;
        }
    }
    else{
        echo $check;
    }
}
else{
    header('location: ../forms/addjeux.php');
}


