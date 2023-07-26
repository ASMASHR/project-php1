
<?php
$posts=App::getInstance()->getTable('Post')->all();
?>
<h1>Administrer les articles </h1>
<table cmass="table">
    <thead>
        <tr>
            <td>id</td>
            <td>TITRE</td>
            <td>actions</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($posts as $post){
            ?>    
        
        <td><?= $post->id?></td>
            <td><?= $post->titre?></td>
            <td>
                <a class="btn btn-primary" href="?page=posts.edit&id=<?= $post->id?>">modifier</a>
<?php
}
        ?>
    </tbody>
</table>