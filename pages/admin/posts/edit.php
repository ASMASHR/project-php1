<?php

use Core\html\BootstrapForm;

$postTable=App::getInstance()->getTable('Post');
$post=$postTable->find($_GET['id']);
$form=new BootstrapForm($post);
$categories=App::getInstance()->getTable('Category')->extactList('id','nom');
if(!empty($_Post)){
   $result= $postTable->update($_GET['id'],['titre'=>$_Post['titre'],'contenu'=>$_Post['contenu'],'categoryId'=>$_Post['categoryId']]);
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
    

?>
<div class="alert alert-succes">
    l'article a bien été modifié
</div>
<?php
   
}
?>