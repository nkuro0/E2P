<?php
$sql = "SELECT * FROM news WHERE id = :id";
$result = $dbh->prepare($sql);
$result->execute(['id' => $_GET['id']]);
$row = $result->fetchObject();
echo '<h3>Mise à jour de la news '.$row->title.' ';
echo '</h3>';
?>
<form action="actions/updatenews.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre de la news</label>
        <input type="text" name="title" value="<?= $row->title ?>" id="titre" class="form-control" required>
    </div>
    <div class="form-group">

        <label for="image">Image de la news</label>
        <input type="file" name="image" id="image" class="form-control">
        <img src="../img/imgNews/<?=$row->img?>" style="width: 200px;">
    </div>
    <div class="form-group">
        <label for="view">Afficher la news</label>
        <select class="form-control" name="view" id="view">
            <option value="1" <?= $row->view ? 'selected' : ''?>>Oui</option>
            <option value="0">Non</option>
        </select>
    </div>
    <div class="form-group">
        <label for="comment">Commentaire de la news</label>
        <textarea name="comment" id="comment" class="form-control"><?= $row->content ?></textarea>
        <script>CKEDITOR.replace("comment")</script>
    </div>

    <div class="form-group">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <input type="submit" name="addnews" value="Mettre à jour" class="btn btn-success form-control">
    </div>
</form>

