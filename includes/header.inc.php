<?php require "_header.php"; ?>

<?php
// Couche logique
// NAVBAR
$sql = "SELECT link, slug FROM pages WHERE `view` = 1";
$resultMenu = $dbh->prepare($sql);
$resultMenu->execute();
$resultMenu2 = $dbh->prepare($sql);
$resultMenu2->execute();

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/search.js"></script>
    <script src="js/glide.min.js"></script>
    <script src="js/semantic.min.js"></script>
    <!-- CK editor -->
    <script src="js/ckeditor/ckeditor.js"></script>
    <script src="js/calcul.js"></script>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC|Nova+Square" rel="stylesheet">

</head>
<body>
<?php require_once 'lib/functions.php' ?>


    <main>
        <!----navbar mobile---->
        <div class="ui sidebar inverted vertical menu">
            <div class="ui transparent icon input">
                <a class="item">
                    <input type="text" class="recherche" name="recherche" placeholder="Rechercher votre jeu">
                    <i class="search link icon inverted"></i>
                </a>
            </div>
            <div class="results" id="results"></div>
            <a class="item" href="?page=panier"><i class="link inverted shop icon"><b>&nbsp(<?=array_sum($_SESSION['panier'])?>)</b></i>Panier</a>
            <?php while($row2 =$resultMenu2->fetchObject()):?>
                <a class="item <?php
                if($_GET['page'] == $row2->slug) {
                    echo 'active';
                }
                ?>" href="?page=<?=$row2->slug?>"><?=$row2->link?></a>

            <?php endwhile;?>
        </div>
        <!----navbar mobile---->
        <!----navbar---->
        <div class="pusher">
        <div class="ui secondary labeled icon toggle button"><i class="sidebar icon"></i>menu</div>
            
       <nav class="ui inverted segment">
           <div class="ui nav container">
            <div class="ui inverted secondary pointing menu">
                 <div class="header item">
                     <img class="logo" src="img/E2P.png">
                 </div>
                     <?php while($row =$resultMenu->fetchObject()):?>
                         <a class="item <?php
                         if($_GET['page'] == $row->slug) {
                             echo 'active';
                         }
                         ?>" href="?page=<?=$row->slug?>"><?=$row->link?></a>

                     <?php endwhile;?>
                    <div class="right menu">
                        <div class="ui transparent icon input">
                            <input type="text" class="recherche" name="recherche" placeholder="Rechercher votre jeu">
                            <i class="search link icon inverted"></i>
                        </div>
                        <div class="panier ui icon input">
                            <a class="_panier" href="?page=panier"><i class="link inverted shop icon"><b>&nbsp(<?=array_sum($_SESSION['panier'])?>)</b></i></a>
                        </div>
                    </div>
            </div>
           </div>
       </nav>

        <div class="ui container">
            <div class="ui right aligned grid">
                <div class="right floated left aligned four wide column">
                        <div class="results" id="results">

                        </div>
                </div>
            </div>

<!----navbar---->

