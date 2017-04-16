<?php
require_once 'actions/updateuser.php';
$sql = "SELECT * FROM users WHERE id = :id";
$result = $dbh->prepare($sql);
$result->execute(['id' => $_GET['id']]);
$row = $result->fetchObject();
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

<h3>Modifier un utilisateur</h3>
<form action="" method="post">
    <div class="form-group">
        <label for="firstname">prénom</label>
        <input type="text" value="<?=$row->firstname?>" name="firstname" id="firstname" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="name">nom</label>
        <input type="text" value="<?=$row->name?>" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="username">pseudo</label>
        <input type="text" value="<?=$row->username?>" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="text" name="password" id="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="password_confirm">Confirmation du mot de passe</label>
        <input type="text" name="password_confirm" id="password_confirm" class="form-control">
    </div>
    <div class="form-group">
        <label for="mail">Email</label>
        <input type="text" value="<?=$row->mail?>" name="mail" id="mail" class="form-control" required>
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
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <input type="submit" name="addnews" value="Ajouter" class="btn btn-success form-control">
    </div>
</form>