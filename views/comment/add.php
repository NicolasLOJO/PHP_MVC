<p>Ajouter un commentaire</a>
<div class="adjustarea">
<form action="?controller=comment&action=<?= $action ?>&id=<?= $_GET['id'] ?>" method="POST">
    <textarea name="newBillet"><?= $value ?></textarea>
    <input type="submit">
</form>
</div>