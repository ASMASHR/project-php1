<?php

use Core\html\BootstrapForm;

$postTable=App::getInstance()->getTable('Post');
$form=new BootstrapForm($$_POST);
$categories=App::getInstance()->getTable('Category')->extactList('id','nom');
if(!empty($_Post)){
   $result= $postTable->create(['titre'=>$_Post['titre'],'contenu'=>$_Post['contenu'],'categoryId'=>$_Post['categoryId']]);
}

?>
<form method="post">
<?= $form->input('titre ','titre de l\'article');?>
<?= $form->input('contenu','contenu',['type'=>'textarea']);?>
<?= $form->select('categoryId','Categorie',$categories);?>
<button class="btn ptn-primary">sauvegarder</button>
</form>

<?php
if($result){

  header('Location:admin.php?page=post.edit&id='.App::getInstance()->  getDB()->lastInsertId());
}
?>
<div class="alert alert-succes">
    l'article a bien été modifié
</div>
<?php
if($result){
    
    
}
?>