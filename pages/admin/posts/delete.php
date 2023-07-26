<?php

if(!empty($_Post)){
   $result= $postTable->delete($_POST['id']);
}
if($result){
   
  header('Location:admin.php'); 
}
?>
