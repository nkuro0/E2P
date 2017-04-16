<?php require "_header.php"; ?>

<?php
// Couche logique
// NAVBAR
$sql = "SELECT link, slug FROM pages WHERE `view` = 1";
$resultMenu = $dbh->prepare($sql);
$resultMenu->execute();

//Requête
$_GET['page'] = $_GET['page'] ?? 'accueil';
$sql = "SELECT title, description, content
        FROM pages
        WHERE slug =:page
        AND `view` = 1";
$result = $dbh->prepare($sql);
$result->execute(['page' => $_GET['page']]);
$page = $result->fetchObject();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E2P</title>

    <!-- Semantic UI core CSS -->
    <link href="css/icon.min.css" rel="stylesheet">
    <link href="css/semantic.min.css" rel="stylesheet">
    <!-- Slider CSS -->
    <link href="css/glide.core.min.css" rel="stylesheet">
    <link href="css/glide.theme.min.css" rel="stylesheet">
    <!-- CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <!-- JS slider & modal & jquery -->
    <script src="js/jquery.js"></script>
    <script src="js/glide.min.js"></script>
    <script src="js/semantic.min.js"></script>
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC|Nova+Square" rel="stylesheet">

</head>
<body>
<?php require_once 'lib/functions.php' ?>

<!----navbar---->
    <main>
       <nav class="ui inverted menu">
            <div class="ui container">
                <div class="header item">
                    <img class="logo" src="img/E2P.png">
                </div>
                <div class="right menu">
                    <?php while($row =$resultMenu->fetchObject()):?>
                        <a class="item <?php
                        if($_GET['page'] == $row->slug) {
                            echo 'active';
                        }
                        ?>" href="?page=<?=$row->slug?>"><?=$row->link?></a>
                    <?php endwhile;?>
                    <div class="ui category search item">
                        <div class="ui transparent icon input">
                            <input class="prompt" type="text" placeholder="Recherche">
                            <i class="search link icon inverted"></i>
                        </div>
                    </div>
                    <div class="panier ui icon input">
                        <a class="_panier" href="?page=panier"><i class="link inverted shop icon"><b>&nbsp(<?=array_sum($_SESSION['panier'])?>)</b></i></a>
                    </div>
                </div>
            </div>
       </nav>

<!----navbar---->

