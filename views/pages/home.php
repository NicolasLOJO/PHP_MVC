<h4>Meilleur Posts</h4>
<div class="row">
<?php
    foreach($favPost as $list){ ?>
    <div class="col s12 m4">
        <div class="card">
            <div class="card-content">
                <p class="heartalign">+ <?= $list['nbr'] ?><i data-post='<?= $list['id'] ?>' class="material-icons right">favorite</i></p>
                <span class="card-title activator grey-text text-darken-4 titlealign"><?= htmlspecialchars($list['title']) ?></span>
                <p>Créé par <?= $list['auth'] ?></p>
                <div class="separator"></div>
                <a href="?controller=posts&action=show&id=<?php echo $list['id']; ?>" class="waves-effect waves-light btn-small"><i class="material-icons right">visibility</i>Voir</a>
            </div>
        </div>
    </div>
<?php
}
?>
</div>


<h4>Meilleur Annonces</h4>
<div class="row">
<?php
    foreach($favAnn as $list){ 
        $img = unserialize($list['img']);
        ?>
    <div class="col s12 m4">
        <div class="card">
            <div class="card-image">
                <img src="<?= $img['img_1'] ?>">
            </div>
            <div class="card-content">
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