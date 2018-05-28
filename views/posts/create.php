<div class="row">
    <form action="?controller=posts&action=<?= $action ?>&id=<?= $_GET['id'] ?>" method="POST" class="col s12">
        <div class="row">
            <div class="input-field col s12">
            <input id="title" name="title" type="text" class="validate" value="<?= $titlebillet ?>">
            <label for="title">Titre</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="textarea1" name="newBillet" class="materialize-textarea"><?= $value ?></textarea>
                <label for="textarea1">Votre texte</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter
                    <i class="material-icons right">send</i>
        </button>
    </form>
</div>