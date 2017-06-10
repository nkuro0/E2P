<?php

require '../../includes/config.inc.php';
spl_autoload_register(function ($class) {
    require '../../lib/'.$class.'.php';
});

var_dump($_POST);

require_once '../lib/check_imgslider.php';
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
        $view = strip_tags($_POST['view']);
        $error = '';

        if($error==''){
            $sql = "INSERT INTO slides (jeux_id, img, view)  VALUES (:id, '$fichier','$view')";
            $result = $dbh->prepare($sql);
            $result->execute([
                'id' => $_POST['title']
            ]);
            header('location: ../index.php?page=slide');
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
    header('location: ../index.php?page=slide');
}