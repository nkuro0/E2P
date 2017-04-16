<?php

if (isset($_SESSION['er'])) {
    if ($_SESSION['er'] == 'ok') {
        echo '<div class="alert alert-success">Insertion correctement effectuée</div>';
    }
    elseif ($_SESSION['er'] == 'empty') {
        echo '<div class="alert alert-danger">Remplissez tous les champs</div>';
    }
    else {
        echo '<div class="alert alert-warning">Problème lors de l\'insertion</div>';
    }
    unset($_SESSION['er']);
}
?>

<h3>Insérer une page</h3>
        <form action="actions/addpage.php" method="post">
            <div class="form-group">
                <label for="link">Lien de la page</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="Lien du menu">
            </div>
            <div class="form-group">
                <label for="view">Afficher la page</label>
                <select class="form-control" name="view" id="view">
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </div>
            <div class="form-group">
                <label for="content">Contenu de la page</label>
                <textarea class="form-control" name="content" id="content" placeholder="Données de la page"></textarea>
                <script>CKEDITOR.replace("content");</script>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Balise title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Balise méta description">
            </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary">Insérer</button>
            </div>
        </form>

