<?php

require '../../includes/config.inc.php';
spl_autoload_register(function ($class) {
    require '../../lib/'.$class.'.php';
});
$dbh = DB::getInstance();
$maxSize = '8196394';
$folder = '../../img/imgJeux/';
$date = time();

if(isset($_POST)){

    if(isset($_FILES['image']) && ($_FILES['image']['error']==0)){
        list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);

        //vérification dimensions
        if(is_null($type) && $width==0 && $height==0){
            die('Erreur de dimensions de l\'image.');
        }
        //vérification de l'extension de l'image (JPG, JPEG, PNG)
        if(!in_array($type, array(IMAGETYPE_JPEG, IMAGETYPE_PNG))){
            die('Seules les extensions JPEG, JPG et PNG sont autorisées');
        }
        //vérification poid image
        if($_FILES['image']['size'] > $maxSize){
            die('le poids du fichier est limité a 8mo');
        }
        //vérification de l'existence du dossier img
        if(!file_exists($folder)){
            die('Le répertoire est inexistant');
        }
        //Définition de l'extension de l'image
        if($type == IMAGETYPE_JPEG){
            $extension = '.jpg';
        }
        elseif($type == IMAGETYPE_PNG){
            $extension = '.png';
        }
        //Définition nom de fichier
        $fichier = $date.$extension;
        //Verification upload
        if(move_uploaded_file($_FILES['image']['tmp_name'], $folder.$fichier)){
            $fp = @fopen($folder.$fichier, 'r');
            //Vérification de lecture du fichier
            if(!$fp){
                unlink($folder.$fichier);
                die('Error');
            }
        }

        $title = strip_tags(($_POST["title"]));
        $prix = floatval($_POST["prix"]);
        $category = $_POST['categorie'];
        $eval = intval($_POST['eval']);
        $quantity = intval($_POST['quantity']);
        $description = strip_tags($_POST['description']);
        $view = strip_tags($_POST['view']);
        $error = '';

       if(strlen($title)<3){
           $error.='Le titre doit être supérieur à 3 caractère';
       }
       if(strlen($title)>100){
           $error.='Le titre doit être inférieur à 50 caractère';
       }
       if($error==''){
           $sql = "INSERT INTO jeux (title, prix, datePub, eval, imgSmall, quantity, description, view)  VALUES ('$title', '$prix', CURDATE(), '$eval', '$fichier', '$quantity', '$description', '$view')";
           $result = $dbh->prepare($sql);
           $result->execute();
           $jeuxInsertedId = $dbh->lastInsertId();
           foreach($category as $val){
               $sql2 = "INSERT INTO cat_join (jeux_id, categorie_id) VALUES ('$jeuxInsertedId', '$val')";
               $result2 = $dbh->prepare($sql2);
               $result2->execute();
           }
           header('location: ../index.php?page=jeux');
       }
       else{
           echo $error;
       }
    }
}
