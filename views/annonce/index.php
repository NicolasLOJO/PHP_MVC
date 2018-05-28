<div class="row">
    <div class="col s6 m6">
        <h2> Annonces</h2>
        <?php if(isset($_SESSION['connected'])) { ?>
        <!-- Modal Trigger -->
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons right">add</i>Ajouter</a>

    <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
            <?php require_once('views/annonce/create.php') ?>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Retour</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div class="row">
<?php
    foreach($posts as $list){ 
        $img = unserialize($list['img']);
        ?>
    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
                <img src="<?= $img['img_1'] ?>">
            </div>
            <div class="card-content">
                <?php if(isset($_SESSION['connected'])) { foreach($fav as $favori){ if($favori['annonce_id'] == $list['id'] && $favori['author_id'] == $_SESSION['id_user']) { ?>
                    <i data-post='<?= $list['id'] ?>' class="material-icons right favoriteA">favorite</i>
                <?php break; } elseif($favori == end($fav)) { ?>
                    <i data-post='<?= $list['id'] ?>' class="material-icons right favoriteA">favorite_border</i>
                <?php }}} if(empty($fav) && isset($_SESSION['connected'])) { ?>
                    <i data-post='<?= $list['id'] ?>' class="material-icons right favoriteA">favorite_border</i>
                <?php } ?>
                <span class="card-title grey-text text-darken-4"><?= $list['title'] ?></span>
                <p>Prix : <?= $list['price'] ?>€</p>
                <p><a href="?controller=annonce&action=show&id=<?php echo $list['id']; ?>" class="waves-effect waves-light btn-small themargin"><i class="material-icons right">visibility</i>Voir</a></p>
                <?php if(isset($_SESSION['connected']) && $_SESSION['Username'] == $list['author']){ ?>
                <?php } ?>
            </div>

        </div>
    </div>          
<?php
}
?>
</div>
