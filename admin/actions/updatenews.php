<?php
// Configuration
session_start();
require '../../includes/config.inc.php';
spl_autoload_register(function($class) {
    require '../../lib/'.$class.'.php';
});
$maxSize = '8196394';
$folder = '../../img/imgNews/';
$dbh = DB::getInstance();
$date = time();

$id = $_POST['id'];
$filename = "SELECT img FROM news WHERE id = '$id'";
$res =  $dbh->prepare($filename);
$res->execute();
$row = $res->fetchobject();

if(isset($_POST)) {
    $sql = "UPDATE news
                SET title=    :title,
                    view=    :view,
                    content=     :content
                WHERE id = :id";
    $result = $dbh->prepare($sql);
    $result->execute(
        [
            'title' => $_POST['title'],
            'view' => $_POST['view'],
            'content' => $_POST['comment'],
            'id' => $id,
        ]
    );

    if (isset($_FILES['image']) && ($_FILES['image']['error'] == 0)) {
        list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);

        //vérification dimensions
        if (is_null($type) && $width == 0 && $height == 0) {
            echo('Erreur de dimensions de l\'image.');
            die;
        }
        //vérification de l'extension de l'image (JPG, JPEG, PNG)
        if (!in_array($type, array(IMAGETYPE_JPEG, IMAGETYPE_PNG))) {
            echo 'Seules les extensions JPEG, JPG et PNG sont autorisées';
            die;
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
        unlink($folder.$row->img);

        $sql = "UPDATE news
                SET img= :img
                WHERE id = :id";
        $result = $dbh->prepare($sql);

        $result->execute(
            [
                'img' => $fichier,
            ]
        );
    }
}

header('location: ../index.php?page=news');
