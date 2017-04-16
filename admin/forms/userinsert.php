<?php
require_once 'actions/adduser.php';
?>
<?php if(!empty($_POST)): ?>
    <?php if(!empty($errors)): ?>
        <div class="six wide column">
            <div class="ui red left aligned segment">
                <h4 class="ui header">Le formulaire n'a pas été rempli correctement</h4>
                <?php foreach($errors as $error): ?>
                    <ul>
                        <li><?= $error; ?></li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<h3>Ajouter un utilisateur</h3>
<form action="" method="post">
    <div class="form-group">
        <label for="firstname">prénom</label>
        <input type="text" name="firstname" id="firstname" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="name">nom</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="username">pseudo</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="text" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password_confirm">Confirmation du mot de passe</label>
        <input type="text" name="password_confirm" id="password_confirm" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="mail">Email</label>
        <input type="text" name="mail" id="mail" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="lvluser">Niveau utilisateur</label>
        <select name="lvluser" class="form-control" id="lvluser">
            <option value="1">Utilisateur</option>
            <option value="2">Modérateur</option>
            <option value="3">Administrateur</option>
            <option value="4">Webdev</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="addnews" value="Ajouter" class="btn btn-success form-control">
    </div>
</form>