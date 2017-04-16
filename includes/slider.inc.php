<?php
// Couche logique
// SLIDER

$sql = "SELECT title, prix, img FROM slides WHERE `view` = 1";
$resultMenu = $dbh->prepare($sql);
$resultMenu->execute();
?>
<link rel="stylesheet" href="css/app.css">
<!----slider---->
<div class="ui container">
    <div id="Glide" class="glide">

        <div class="glide__arrows">
            <button class="glide__arrow prev" data-glide-dir="<">prev</button>
            <button class="glide__arrow next" data-glide-dir=">">next</button>
        </div>

        <div class="glide__wrapper">
            <ul class="glide__track slider__track">
                <?php while($slides =$resultMenu->fetchObject()):?>
                <li class="glide__slide">
                    <div class="ui backfont segment">
                    <p id="slidetitle"><?=$slides->title?></p>
                    <p id="slideprice"><?=$slides->prix?>€</p>
                    </div>
                    <img src="img/slider/<?= $slides->img ?>">
                </li>
                <?php endwhile;?>
            </ul>
        </div>

        <div class="glide__bullets"></div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#gamies').click(function(){
            $('.ui.modal').modal('show');
        });
    });
</script>

<script>
    $("#Glide").glide({
        beforeTransition: function(data){
            console.log('callback: beforeTransition', data);
            $(data).addClass('lol');
        },
        afterTransition: function(data){
            console.log('callback: afterTransition', data);
        },
    });
</script>



<!----/slider---->