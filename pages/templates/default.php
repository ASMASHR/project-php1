<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= App::getInstance()->title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js">
</head>

  <body>
<?php
?>
    <div class="navbar navbar-inverse navbar-fixed-top">
      
        <div class="container">
        <div class="navbar-header">
           <a class="navbar-brand" href="index.php">Project name</a>
        </div>
    </div>
      
    </div>

    <div class="container" style="padding-top:100px;">

        <div class="starter-template">
         <?=$content;
         ?>   
        </div>   
    </div>

  </body>
</html>