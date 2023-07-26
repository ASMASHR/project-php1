<?php
$post=App::getInstance()->getTable('Post')->find($_GET['id']);
if($post===false){
      App::getInstance()->notfound();
   }
   
App::getInstance()->title=$post->titre;
   $categorie=App::getInstance()->getTable('category')->find($post->categoryId);
?>
      <h1><?=$post->titre?> </h1>
      <p>
      <em><?=$categorie->nom?></em>
      </p>
 