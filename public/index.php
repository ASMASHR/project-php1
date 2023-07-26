<?php
define('ROOT', dirname(__DIR__)).
require ROOT.'/app/App.php';
var_dump(sha1('demo'));

App::load();
$app=App::getInstance();
//$posts=$app->getTable('Post');
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else 
$page='home';
ob_start();
if($page==='home'){
    require ROOT .'/pages/articles/home.php';
}
elseif($page==="single.post"){
    require ROOT .'/pages/articles/Article.php';
}
elseif($page==="post.category"){
    require ROOT .'/pages/articles/categorie.php';
}

elseif($page==="login"){
    require (dirname(__DIR__) .'/pages/users/Login.php');
}
$content=ob_get_clean();
require ROOT.'/pages/templates/default.php';