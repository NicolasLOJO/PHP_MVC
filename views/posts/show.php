
<div class="themarginpost"></div>
<div class="row">
  <div class="col s12"> 
  <?php if(isset($_SESSION['connected']) && $_SESSION['Username'] == $posts['author'] || isset($_SESSION['connected']) && $_SESSION['privilege'] > 50){ ?>
  <a href="?controller=posts&action=update&id=<?php echo $posts['id']; ?>" class="waves-effect waves-light btn-small"><i class="material-icons right">edit</i>Editer</a>
  <a href="?controller=posts&action=delete&id=<?php echo $posts['id']; ?>" class="waves-effect waves-light btn-small"><i class="material-icons right">delete</i>Supprimer</a>
  <?php } ?>   
    <ul class="card collection">
      <li class="collection-item">
        <div class="col s3">
          <?= $posts['author'] ?>
          <p>Posté le : <?php $date = date_create($posts['created_date']); echo date_format($date, 'd/m/Y'); ?></p>
          <p>Modifié le : <?php $modified = date_create($posts['modified_date']); echo date_format($modified, 'd/m/Y'); ?></p>
        </div>
        <div class="col s9">
          <h5 class=""><?= htmlspecialchars($posts['title']) ?></h5>
          <p class=""><?= htmlspecialchars($posts['content']) ?></p>
        </div>
      </li>
    </ul>
    <a href="?controller=comment&action=add&id=<?= $_GET['id'] ?>" class="waves-effect waves-light btn-small"><i class="material-icons right">add</i>Ajouter un commentaire</a>
    <ul class="card collection">
      <?php
        foreach($list as $post){
      ?>
      <li class="collection-item">
        <div class="row  valign-wrapper">
          <div class="col s3">
            <p><strong><?= $post['author'] ?> : </strong></p>
            <p>Posté le : <?php $date_comment = date_create($post['comment_date']); echo date_format($date_comment, 'd/m/Y'); ?></p>
          </div>
          <div class="col s9">
            <strong><?= $post['comment'] ?></strong>
          </div>
        </div>
      </li>
      <?php
        }
      ?>
    </ul>
  </div>
</div>
