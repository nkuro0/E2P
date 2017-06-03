</main>
<footer>
    <div class="ui inverted vertical footer segment">

        <div class="ui container stackable inverted divided equal height stackable grid">
            <div class="eight wide column">
                <h4 class="ui inverted header center aligned">Sitemap</h4>
                <div class="ui inverted link list center aligned segment">
                    <a href="#" class="item">Accueil</a>
                    <a href="#" class="item">A propos</a>
                    <a href="#" class="item">Services</a>
                    <a href="#" class="item">Support</a>
                </div>
            </div>

            <div class="height wide column">
                <div class="ui center aligned segment inverted">
                <h4 class="ui header">Méthode de paiements</h4>
                <i class="big american express icon"></i>
                <i class="big discover icon"></i>
                <i class="big mastercard icon"></i>
                <i class="big paypal card icon"></i>
                <i class="big visa icon"></i>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</body>
<script src="js/app.js"></script>
<?php if(isset($_SESSION['auth'])): ?>
<script type="text/javascript">
    CKEDITOR.replace('edit');
</script>
<script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = '58798888bf923c06c182abd15c3cf587becd0ce6';
    window.smartsupp||(function(d) {
        var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
        s=d.getElementsByTagName('script')[0];c=d.createElement('script');
        c.type='text/javascript';c.charset='utf-8';c.async=true;
        c.src='//www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
    smartsupp('email', '<?=$_SESSION['auth']->mail?>');
    smartsupp('name', '<?=$_SESSION['auth']->name?> <?=$_SESSION['auth']->firstname?>');
</script>
<?php endif;?>

</html>