<?php
$sql="SELECT * FROM categorie";
$result = $dbh->prepare($sql);
$result->execute();
?>
<h3>Ajouter un jeu</h3>
<form action="actions/addjeux.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre du jeu</label>
        <input type="text" name="title" id="titre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="prix">Prix du jeu</label>
        <input type="number" step="0.01" name="prix" id="prix" class="form-control" required>
    </div>
    <div class="form-check">
        <label for="categorie" class="form-check-label">
            <?php while ($cat=$result->fetchobject()):?>
            <br><input name="categorie[]" value="<?= $cat->id ?>" type="checkbox" class="form-check-input"> <?= $cat->tags ?>
            <?php endwhile; ?>
        </label></br>

    </div>
    <div class="form-group">
        <label for="eval">Evaluation du jeu</label>
        <select name="eval" class="form-control" id="evalSelect">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group">
        <label for="quantity">Quantité en stock</label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="image">Image du jeu</label>
        <input type="file" name="image" id="image" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="view">Afficher le jeu</label>
        <select class="form-control" name="view" id="view">
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description du jeu</label>
        <textarea name="description" id="description" class="form-control"></textarea>
        <script>CKEDITOR.replace("description")</script>
    </div>
    <div class="form-group">
        <input type="submit" name="addjeux" value="Ajouter" class="btn btn-success form-control">
    </div>
</form>

