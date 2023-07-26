<?php
use Core\Auth\DBAuth;
define('ROOT', dirname(__DIR__)).
require ROOT.'/app/App.php';


App::load();
$app=App::getInstance();
$posts=$app->getTable('Post');
$auth= new DBAuth($app->getDB());
if(!$auth->logged()){
    $app->forbidden();
}

if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else 
$page='home';
ob_start();
if($page==='home'){
    require ROOT .'/pages/admin/posts/index.php';
}
elseif($page==="single.post"){
    require ROOT .'/pages/admin/posts/Article.php';
}
elseif($page==="post.category"){
    require ROOT .'/pages/admin/posts/categorie.php';
}
elseif($page==="posts.add"){
    require ROOT .'/pages/admin/posts/add.php';
}
elseif($page==="posts.delete"){
    require ROOT .'/pages/admin/posts/delete.php';
}
elseif($page==="posts.edit"){
    require ROOT .'/pages/admin/posts/edit.php';
}
//categories
if($page==='categorieshome'){
    require ROOT .'/pages/admin/categories/index.php';
}

elseif($page==="category.add"){
    require ROOT .'/pages/admin/categories/add.php';
}
elseif($page==="category.delete"){
    require ROOT .'/pages/admin/categories/delete.php';
}
elseif($page==="category.edit"){
    require ROOT .'/pages/admin/categories/edit.php';
}
$content=ob_get_clean();
require ROOT.'/pages/templates/default.php';