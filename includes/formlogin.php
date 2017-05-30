<div class="three wide column">

    <h3 class="ui header center aligned segment">Mon compte</h3>

<form action="actions/login.php" method="POST">
    <?php if(!isset($_SESSION['auth'])):?>
        <input type="hidden" name="page" value="<?=$_GET['page']?>">
        <div class="field">
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="username" placeholder="Login">
            </div>
        </div>
        <div class="field">
            <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" placeholder="Mot de passe">
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['auth'])): ?>
        <a href="includes/Logout.php"><div class="ui fluid large teal submit button">Logout</div></a>
    <?php endif; ?>
    <?php if(!isset($_SESSION['auth'])): ?>
        <button class="ui fluid large teal submit button" type="submit">Login</button>
    <?php endif; ?>

        <a href="?page=inscription"><div class="ui fluid large teal submit button">Inscription</div></a>
        <div class="ui fluid large teal submit button" data-api="smartsupp" data-operation="open" data-text="Bonjour, veuillez nous faire part de votre problème"/>Support</div>
    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach($_SESSION['flash'] as $type => $message): ?>
            <div class="ui center aligned green segment">
                <p>Bonjour <b><?= $_SESSION['auth']->firstname ?> <?= $_SESSION['auth']->name ?></b></p>
                <p><?= $message ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
<?php if($_GET['page']!='catalogue'):?>
</div>
<?php endif;?>
</form>
