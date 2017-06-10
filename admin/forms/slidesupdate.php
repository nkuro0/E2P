<?php
$sql="SELECT jeux.id, jeux.title, slides.img, slides.view, slides.jeux_id FROM jeux INNER JOIN slides ON slides.jeux_id = jeux.id WHERE slides.id= :id";
$sql2="SELECT jeux.id, jeux.title FROM jeux";
$result = $dbh->prepare($sql);
$result->execute(['id' => $_GET['id']]);
$result2 = $dbh->prepare($sql2);
$result2->execute(['id' => $_GET['id']]);
$row = $result->fetchObject();

?>
<h3>Modifier la slide de <?= $row->title ?></h3>

<form action="actions/updateslides.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input type="hidden" value="<?=$_GET['id']?>" name="id">
                <label for="sel1">Titre du jeu</label>
                <select name="title" class="form-control" id="sel1" required>
                    <?php while($row2 = $result2->fetchobject()): ?>
                        <option value="<?=$row2->id?>"><?=$row2->title?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image du jeu</label>
                <input type="file" name="image" id="image" class="form-control">
                <p><?=$row->img?></p>
                <img src="../img/slider/<?=$row->img?>" style="width: 300px;">
            </div>
            <div class="form-group">
                <label for="view">Afficher la slide</label>
                <select class="form-control" name="view" id="view">
                    <option value="1" <?= $row->view ? 'selected' : ''?>>Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="addslide" value="Ajouter" class="btn btn-success form-control">
            </div>
        </div>
    </div>
</form>