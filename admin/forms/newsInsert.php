<h3>Ajouter une actualité</h3>
<form action="actions/addnews.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre de la news</label>
        <input type="text" name="title" id="titre" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="image">Image de la news</label>
        <input type="file" name="image" id="image" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="view">Afficher la page</label>
        <select class="form-control" name="view" id="view">
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
    </div>
    <div class="form-group">
        <label for="comment">Commentaire de la news</label>
        <textarea name="comment" id="comment" class="form-control"></textarea>
        <script>CKEDITOR.replace("comment")</script>
    </div>
    <div class="form-group">
        <input type="submit" name="addnews" value="Ajouter" class="btn btn-success form-control">
    </div>
</form>

