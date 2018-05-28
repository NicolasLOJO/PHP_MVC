<div class="row justify-content-center memberspace">
    <div class="infomember col-3">
        <p>Username : <?= $_SESSION['Username'] ?></p>
        <p>Inscrit depuis le : </p>
    </div>
    <div class="billetmember col-6">
        <p> Vous avez 0 Billets</p>
        <a href='?controller=posts&action=index&id=<?= $_SESSION['id_user'] ?>' class="btn btn-primary">Voir mes posts</a>
    </div>
</div>