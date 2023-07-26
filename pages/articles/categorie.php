<?php
die("fffffffffff");
$categoryTable=App::getInstance()->getTable('category');
$PostTable=App::getInstance()->getTable('Post');
$categorie=$categoryTable->find($_GET['id']);
$articles=$PostTable->LastByCategorie($_GET['id']);
$categories=$categoryTable->all();
$data= $PostTable->getLast();

if($categorie==false){
   App::getInstance()->notfound();
}
?>
<h1><?= $categorie->nom ?> </h1>
<div class="row">
  <div class="col-sm-8">
      <?php
  foreach($articles as $post){
    ?>
  
        <h2><a href="<?=$post->url?>"><?=$post->titre?></a></h2>
        <p><em><?=$post->categorie?></em>
        <p><?=$post->extrait ?></p>
       
<?php
}
?>
  </div>
<div class="col-sm-4">
 <ul>
 <?php
  foreach($categories as $categorie){
?>
<li><a href="<?=$categorie->url?>"><?=$categorie->nom?></a>
<?php
  }
  ?>
  </ul>
</div>
</div>