<p>Inscription</p>
<?php
if(isset($_SESSION['connected'])){
?>
<p>Vous avez déjà un compte</p>
<a href="/Php_MVC/New_blog">Retour a l'acceuil</a>
<?php
} else {
?>
<div class="loginscreen">
<form id="monform" action="?controller=Connected&action=create" method="POST">
    <div id="1" class="form-group">
        <label>Username: <input id="pseudo" class="form-control loginwidth" type="text" name="pseudo" placeholder="You're Username"></label>
    </div>
    <div id="2" class="form-group">
        <label>Password: <input id="password" class="form-control loginwidth" type="password" name="password" placeholder="You're Password"></label>
    </div>
    <div id="3" class="form-group">
        <label>Confirm Password: <input id="passverif" class="form-control loginwidth" type="password" name="verifpass" placeholder="Confirm Password"></label>
    </div>
        <input id='submitS' type="button" value="Create">
</form>
</div>
<?php
}
?>