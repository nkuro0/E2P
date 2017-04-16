<?php

var_dump($_POST);

$errors = array();

if(empty($_POST['firstname']) || !preg_match('/^\p{L}+$/ui', $_POST['firstname'])){
    $errors['firstname'] = "Vous n'avez pas entré prenom";
}

if(empty($_POST['name']) || !preg_match('/^\p{L}+$/ui', $_POST['name'])){
    $errors['name'] = "Vous n'avez pas entré nom";
}
if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
    $errors['username'] = "Vous n'avez pas entré de pseudo";
}
else {
    $req = $dbh->prepare("SELECT id FROM users WHERE username = ?");
    $req->execute([$_POST['username']]);
    $user = $req->fetch();
    if($user){
        $errors['username'] = 'Ce pseudo est déjà pris';
    }
}
if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
    $errors['mail'] = "Adresse mail non valide";
}
else {
    $req = $dbh->prepare("SELECT id FROM users WHERE mail = ?");
    $req->execute([$_POST['mail']]);
    $user = $req->fetch();
    if($user){
        $errors['mail'] = 'Cet adresse mail est déjà utilisée sur un autre compte';
    }
}
if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
    $errors['password'] = "Votre mot de passe doit être valide";
}

if(empty($errors)){
    $sql = "INSERT INTO users SET firstname = ?, `name` = ?, username = ?, password = ?, mail = ?, levelUser = ?";
    $req = $dbh->prepare($sql);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $req->execute([$_POST['name'], $_POST['firstname'], $_POST['username'], $password, $_POST['mail'], $_POST['lvluser']]);
    die('<div class="ui container center aligned segment">
            <h2 class="ui header center aligned">L\'inscription s\'est bien déroulée</h2>
            <h4 class="ui header center aligned"><a href="?page=user">Retour a la gestion des utilisateurs</a>
         </div>');
}

