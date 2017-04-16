<?php
$sql = "SELECT * FROM pages WHERE id = :id";
$result = $dbh->prepare($sql);
$result->execute(['id' => $_GET['id']]);
$row = $result->fetchObject();
echo '<h3>Mise à jour de la page '.$row->link.' ';
    if ($row->id > 6) {
    echo '<a href="actions/delpage.php?id='.$row->id.'">[Supprimer]</a>';
    }
    echo '</h3>';
if (isset($_SESSION['er'])) {
    if ($_SESSION['er'] == 'ok') {
        echo '<div class="alert alert-success">Mise à jour correctement effectuée</div>';
    }
    else {
        echo '<div class="alert alert-warning">Problème lors de la mise à jour</div>';
    }
    unset($_SESSION['er']);
}
?>
<form action="actions/updatepage.php" method="post">
    <div class="form-group">
        <label for="link">Lien de la page</label>
        <input type="text" class="form-control" name="link" id="link" value="<?=$row->link?>">
    </div>
    <div class="form-group">
        <label for="view">Voir la page</label>
        <select name="view" class="form-control" id="view" <?= $row->slug == 'accueil' ? 'disabled' : ''?>>
            <option value="0">Non</option>
            <option value="1" <?= $row->view ? 'selected' : ''?>>Oui</option>
        </select>
    </div>
    <div class="form-group">
        <label for="content">Lien de la page</label>
        <textarea name="content" id="content" class="form-control"><?=$row->content?></textarea>
        <script>CKEDITOR.replace("content")</script>
    </div>
    <div class="form-group">
        <input type="hidden" name="id" value="<?=$row->id?>">
        <button class="form-control btn btn-primary">Mettre à jour</button>
    </div>
</form>


