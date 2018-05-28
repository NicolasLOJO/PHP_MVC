<div class="row valign-wrapper">
  <div class="col s4">
    <h5><?= htmlspecialchars($posts['title']) ?></h5>
  </div>
  <div class="col s4">
    <?php
      if(isset($_SESSION['connected']) && $_SESSION['Username'] == $posts['author'] || isset($_SESSION['connected']) && $_SESSION['privilege'] > 50){
    ?>
    <a href="?controller=annonce&action=update&id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn-small"><i class="material-icons right">edit</i>Editer</a>
    <a href="?controller=annonce&action=delete&id=<?php echo $_GET['id']; ?>" class="waves-effect waves-light btn-small"><i class="material-icons right">delete</i>Supprimer</a>
    <?php
      }
    ?>
  </div>
</div>
<div class="card row">
  <div class="row">
    <?php
    $image = unserialize($posts['img']);
    foreach($image as $value){
    ?>
    <div class="col s4 cadre">
      <img class="materialboxed postimg" src="<?= $value ?>">
    </div>
    <?php
    }
    ?>
  </div>
  <ul class="collection">
    <li class="collection-item">
      <?= $posts['author'] ?>
      <p class="card-text"><?= htmlspecialchars($posts['description']) ?></p>
      <p class="card-text">Prix : <?= htmlspecialchars($posts['price']) ?>€</p>
      <p class="card-text">Categorie : <?= htmlspecialchars($posts['cat']) ?></p>
      <p class="card-text">Region : <?= htmlspecialchars($posts['reg']) ?></p>
      <p>Posté le : <?php $date = date_create($posts['created_date']); echo date_format($date, 'd/m/Y'); ?></p>
    </li>
  </ul>
</div>
