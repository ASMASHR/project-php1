<?php

use Core\Auth\DBAuth;
use Core\html\BootstrapForm;

$form=new BootstrapForm($_POST);
if(!empty($_POST)){
    $auth=new DBAuth(App::getInstance()->getDB());
    if($auth->login($_POST['username'],$_POST['password']))
   { header('location:admin.php');}
    else
    {?>
    <div class="alert alert-danger">Identifiant incorrect</div>
    <?php

    }
}
?>
<form method="post">
<?= $form->input('username','pseudo');?>
<?= $form->input('password','pass',['type'=>'password']);?>
<button class="btn ptn-primary">Envoyer</button>

</form>