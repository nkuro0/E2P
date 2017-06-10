<?php
$sql = "SELECT * FROM jeux WHERE jeux.id = :id";
$result = $dbh->prepare($sql);
$result->execute(['id' => $_GET['id']]);
$row = $result->fetchObject();

$sql = "SELECT * FROM categorie";
$allCat= $dbh->prepare($sql);
$allCat->execute();


$sql2 = "SELECT * FROM cat_join WHERE jeux_id = :id ";
$result2 = $dbh->prepare($sql2);
$result2->execute(['id' => $_GET['id']]);
$realcat = array();
while($checkedcat=$result2->fetchObject()){
    $realcat[] = $checkedcat->categorie_id;
}

?>
<h3>Modifier un jeu</h3>
<div class="row">
    <div class="col-sm-6">
<form action="actions/updatejeux.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre du jeu</label>
        <input type="text" name="title" value="<?=$row->title?>" id="titre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="prix">Prix du jeu</label>
        <input type="number" step="0.01" value="<?=$row->prix?>"" name="prix" id="prix" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="date">Date de sortie</label>
        <input type='text' name="date" value="<?=$row->datePub?>" class="form-control" id='datetimepicker' />
    </div>
    <div class="form-check">
        <label for="categorie" class="form-check-label">
            <?php while ($cat=$allCat->fetchobject()):?>
                <br><input name="categorie[]" value="<?= $cat->id ?>" type="checkbox" class="form-check-input" <?php echo (in_array($cat->id,$realcat)?"checked":"") ?>> <?= $cat->tags ?>
            <?php endwhile; ?>
        </label></br>
    </div>
    <div class="form-group">
        <label for="quantity">Quantité en stock</label>
        <input type="number" value="<?=$row->quantity?>" name="quantity" id="quantity" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="image">Image du jeu</label>
        <input type="file" name="image" id="image" class="form-control">
        <p><?=$row->imgSmall?></p>
        <img src="../img/imgJeux/<?=$row->imgSmall?>" style="width: 200px;">
    </div>
    <div class="form-group">
        <label for="video">Vidéo du jeu</label>
        <input type="url" value="<?=$row->url?>" name="url" id="url" class="form-control">
        <div class="video-gallery">
            <iframe src="<?=$row->url?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="form-group">
        <label for="view">Afficher le jeu</label>
        <select class="form-control" name="view" id="view">
            <option value="1" <?= $row->view ? 'selected' : ''?>>Oui</option>
            <option value="0">Non</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description du jeu</label>
        <textarea name="description" id="description" class="form-control"><?=$row->description?></textarea>
        <script>CKEDITOR.replace("description")</script>
    </div>
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="submit" name="updatejeux" value="Modifier" class="btn btn-success form-control">
    </div>
</form>
        </div>
    </div>
