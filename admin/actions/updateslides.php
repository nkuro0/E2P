<?php
require '../../includes/config.inc.php';
spl_autoload_register(function ($class) {
    require '../../lib/'.$class.'.php';
});

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
            $sql = "UPDATE slides SET jeux_id= :jeux_id, img= :img, view= :view WHERE id= :id ";
            $result = $dbh->prepare($sql);
            $result->execute([
                'jeux_id' => $_POST['title'],
                'img' => $fichier,
                'view' => $_POST['view'],
                'id' => $_POST['id']
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