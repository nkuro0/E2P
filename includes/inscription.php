<?php
require_once 'actions/register.php';
?>

<div class="ui container">
    <div class="ui grid">
    <div class="ten wide column">
    <form action="" method="POST">
        <div class="ui form segment">
            <div class="two fields">
                <div class="field">
                    <label>Nom</label>
                    <input placeholder="Nom" name="name" type="text">
                </div>
                <div class="field">
                    <label>Prénom</label>
                    <input placeholder="Prénom" name="firstname" type="text">
                </div>
            </div>
            <div class="field">
                <label>Pseudo</label>
                <input placeholder="pseudo" name="username" type="text">
            </div>
            <div class="field">
                <label>Mot de passe</label>
                <input placeholder="Votre mot de passe "type="password" name="password">
            </div>
            <div class="field">
                <label>Confirmation mot de passe</label>
                <input placeholder="Confirmer votre mot de passe "type="password" name="password_confirm">
            </div>
            <div class="field">
                <label>Email</label>
                <input placeholder="Votre adresse mail" name="mail">
            </div>
            <button type="submit" class="ui blue submit button">S'inscrire</button>
        </div>
    </form>
    </div>
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
    </div>
</div>