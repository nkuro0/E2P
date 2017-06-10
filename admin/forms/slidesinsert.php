<?php
$sql="SELECT jeux.id, jeux.title FROM jeux";
$result = $dbh->prepare($sql);
$result->execute();
?>
<h3>Ajouter un jeu</h3>

<form action="actions/addslides.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="sel1">Titre du jeu</label>
                <select name="title" class="form-control" id="sel1" required>
                    <?php while($row = $result->fetchobject()): ?>
                    <option value="<?= $row->id ?>"><?=$row->title?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image de la slide</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="view">Afficher la slide</label>
                <select class="form-control" name="view" id="view">
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="addslide" value="Ajouter" class="btn btn-success form-control">
            </div>
        </div>
    </div>
</form>

