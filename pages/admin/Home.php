<?php

use App\Table\Article;
use App\Table\Categorie;

$data= App::getInstance()->getTable('Post')->getLast();
?>
<div class="row">
  <div class="col-sm-8">
      <?php
  foreach($data as $post){
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
  $categories=App::getInstance()->getTable('category')->all();
  foreach($categories as $categorie){
?>
<li><a href="<?=$categorie->url?>"><?=$categorie->nom?></a>
<?php
  }
  ?>
  </ul>
</div>
</div>
