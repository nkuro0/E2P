<?php
// Configuration
session_start();
require '../../includes/config.inc.php';
spl_autoload_register(function($class) {
    require '../../lib/'.$class.'.php';
});

$maxSize = '8196394';
$folder = '../../img/imgJeux/';
$dbh = DB::getInstance();
$date = time();
$id = $_POST['id'];
$filename = "SELECT imgSmall FROM jeux WHERE id = '$id'";
$res =  $dbh->prepare($filename);
$res->execute();
$row = $res->fetchobject();

if(isset($_POST)) {

        $sql = "UPDATE jeux
                SET title=    :title,
                    prix= :prix,
                    datePub= CURDATE(),
                    eval= :eval,
                    quantity= :quantity,
                    view= :view,
                    description= :description
                WHERE id = :id";

        $result = $dbh->prepare($sql);
        $result->execute(
            [
                'title' => $_POST['title'],
                'prix' => $_POST['prix'],
                'eval' => $_POST['eval'],
                'quantity' => $_POST['quantity'],
                'view' => $_POST['view'],
                'description' => $_POST['description'],
                'id' => $id,
            ]
        );

    $sql2 = "DELETE FROM cat_join WHERE jeux_id = :id";
    $result2 = $dbh->prepare($sql2);
        $result2->execute(
            [
                'id' => $id
            ]
        );

    $category = $_POST['categorie'];
    foreach($category as $val){
        $sql3 = "INSERT INTO cat_join (jeux_id, categorie_id) VALUES ('$id','$val')";
        $result3 = $dbh->prepare($sql3);
        $result3->execute();
    }


    if (isset($_FILES['image']) && ($_FILES['image']['error'] == 0)) {
        list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);

        //vérification dimensions
        if (is_null($type) && $width == 0 && $height == 0) {
            die('Erreur de dimensions de l\'image.');
        }
        //vérification de l'extension de l'image (JPG, JPEG, PNG)
        if (!in_array($type, array(IMAGETYPE_JPEG, IMAGETYPE_PNG))) {
            die('Seules les extensions JPEG, JPG et PNG sont autorisées');
        }
        //vérification poid image
        if ($_FILES['image']['size'] > $maxSize) {
            die('le poids du fichier est limité a 8mo');
        }
        //vérification de l'existence du dossier img
        if (!file_exists($folder)) {
            die('Le répertoire est inexistant');
        }
        //Définition de l'extension de l'image
        if ($type == IMAGETYPE_JPEG) {
            $extension = '.jpg';
        } elseif ($type == IMAGETYPE_PNG) {
            $extension = '.png';
        }
        //Définition nom de fichier
        $fichier = $date.$extension;

        //Verification upload
        if (move_uploaded_file($_FILES['image']['tmp_name'], $folder . $fichier)) {
            $fp = @fopen($folder . $fichier, 'r');
            //Vérification de lecture du fichier
            if (!$fp) {
                unlink($folder . $fichier);
                die('Error');
            }
        }
        //suppression ancienne image
        unlink($folder.$row->imgSmall);

        $sql = "UPDATE jeux
                SET imgSmall= :img,
                WHERE id = :id";

        $result = $dbh->prepare($sql);
        $result->execute(
            [
                'img' => $fichier,
            ]
        );
    }
}

header('location: ../index.php?page=jeux');
