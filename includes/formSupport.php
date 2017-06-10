
<div class="ui container">
    <div class="ui grid">
        <div class="ui two column stackable grid">
            <h2 class="ui header">Formulaire de contact</h2>
            <div class="two column row">
        <div class="eight wide column">
            <?php if(isset($_SESSION['ValidateMail'])): ?>
            <div class="ui center aligned green segment"><h4><?=$_SESSION['ValidateMail']?></h4></div>
                <?php unset($_SESSION['ValidateMail'])?>
            <?php endif; ?>
            <form action="actions/contact" method="POST">
                <?php if(isset($_SESSION['auth'])): ?>
                <input type="hidden" name="idUser" value="<?= $_SESSION['auth']->id?>">
                <div class="ui form segment">
                    <div class="two fields">
                        <div class="field">
                            <label for="name">Nom</label>
                            <input placeholder="Nom" name="name" type="text" value="<?= $_SESSION['auth']->name ?>" readonly>
                        </div>
                        <div class="field">
                            <label for="firstname">Prénom</label>
                            <input placeholder="Prénom" name="firstname" type="text" value="<?= $_SESSION['auth']->firstname ?>" readonly>
                        </div>
                    </div>

                        <div class="field">
                        <label for="username">Pseudo</label>
                        <input placeholder="Pseudo" name="username" type="text" value="<?= $_SESSION['auth']->username?>" readonly>
                        </div>

                    <div class="field">
                        <label for="mail">Email</label>
                        <input placeholder="Votre adresse mail" name="mail" value="<?= $_SESSION['auth']->mail ?>" readonly>
                    </div>
                    <?php else: ?>
                    <div class="ui form segment">

                        <div class="two fields">
                            <div class="field">
                                <label for="name">Nom</label>
                                <input placeholder="Nom" name="name" type="text">
                            </div>
                            <div class="field">
                                <label for="firstname">Prénom</label>
                                <input placeholder="Prénom" name="firstname" type="text">
                            </div>
                        </div>
                        <div class="field">
                            <label for="mail">Email</label>
                            <input placeholder="Votre adresse mail" name="mail">
                        </div>
                    <?php endif;?>

                    <div class="field">
                        <label>Message</label>
                        <textarea name="text" minlength="10" maxlength="200" required></textarea>
                    </div>
                    <button type="submit" class="ui blue submit button">Envoyer</button>
                </div>
            </form>
        </div>
        <div class="eight wide column map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2538.3587104675757!2d4.869419315360796!3d50.49028127948089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c1994a24f9279b%3A0x6bca6d52531a7e82!2sRue+du+Rond+Ch%C3%AAne%2C+5020+Namur%2C+Belgique!5e0!3m2!1sfr!2sfr!4v1487012951601" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
                </div>
            </div>
    </div>
</div>