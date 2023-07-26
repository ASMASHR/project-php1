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
    require ROOT .'/pages/admin/posts/edit.php';
}
elseif($page==="posts.edit"){
    require ROOT .'/pages/admin/posts/categorie.php';
}
$content=ob_get_clean();
require ROOT.'/pages/templates/default.php';