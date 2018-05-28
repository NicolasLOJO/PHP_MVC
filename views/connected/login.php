<?php
if (!isset($_SESSION['connected'])){
    ?>

<div class="row login">
    <h4>Connexion</h4>
        <form action="?controller=Connected&action=verifLogin" method="POST" class="col s12 formlogin">
            <div class="row">
                <div class="input-field col m12 s12">
                    <i class="material-icons iconis prefix">account_box</i>
                    <input id="usernamelogin" name="pseudo" type="text" class="validate">
                    <label for="usernamelogin">Username</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col m12 s12">
                    <i class="material-icons iconis prefix">enhanced_encryption</i>
                    <input id="passwordlogin" name="password" type="password" class="validate">
                    <label for="passwordlogin">Mot de passe</label>
                </div>
            </div>
            <div class="row">
                <button id="loginbutton" class="btn waves-effect waves-light" type="button" name="action">Connexion</button>
            </div>
        </form>
        <div class="row center-align">
            <a href="?controller=Connected&action=signup">Pas encore inscrit ?</a>
        </div>
        </div>
    </h4>
</div>

<?php
} elseif(isset($_SESSION['connected'])){
?>
<p> Vous etes desormais connecté </p>
<a href="/Php_MVC/New_blog">Retour a l'acceuil</a>
<?php
}
?>