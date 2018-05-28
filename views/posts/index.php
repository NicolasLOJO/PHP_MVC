<div class="row">
    <div class="col s6 m6">
        <h2>Posts</h2>
        <?php
            if(isset($_SESSION['connected'])){
        ?>
         <!-- Modal Trigger -->
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons right">add</i>Ajouter</a>

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <div class="adjustarea">
                    
                <?php require_once('views/posts/create.php'); ?>
        
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Retour</a>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>
<div class="row">
<?php
    foreach($posts as $list){ ?>
    <div class="col s12 m6">
        <div class="card">
            <div class="card-content">
            <?php if(isset($_SESSION['connected'])) { foreach($fav as $favori){ if($favori['post_id'] == $list['id'] && $favori['author_id'] == $_SESSION['id_user']) { ?>
                <i data-post='<?= $list['id'] ?>' class="material-icons right favoriteP">favorite</i>
            <?php break; } elseif($favori == end($fav)) { ?>
                <i data-post='<?= $list['id'] ?>' class="material-icons right favoriteP">favorite_border</i>
            <?php }}} if(empty($fav) && isset($_SESSION['connected'])){ ?>
                <i data-post='<?= $list['id'] ?>' class="material-icons right favoriteP">favorite_border</i>
            <?php } ?>
                <span class="card-title activator grey-text text-darken-4"><?= htmlspecialchars($list['title']) ?></span>
                <p>Créé par <?= $list['author'] ?></p>
                <div class="separator"></div>
                <a href="?controller=posts&action=show&id=<?php echo $list['id']; ?>" class="waves-effect waves-light btn-small"><i class="material-icons right">visibility</i>Voir</a>
            </div>
        </div>
    </div>
<?php
}
?>
</div>