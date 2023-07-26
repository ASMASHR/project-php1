
<?php
$posts=App::getInstance()->getTable('Post')->all();
?>
<h1>Administrer les articles </h1>
<a class="btn btn-primary" href="?page=posts.add">Ajouter un article</a>
<table class="table">
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
                <form action="?page=posts.delete" method="post">
                    <input type="hidden"name="id" value="<?= $post->id?>"> 
                    <button type="submit" class="btn btn-danger" href="?page=posts.delete&id=<?= $post->id?>">Suprimer</button>
                </form>
               
<?php
}
        ?>
    </tbody>
</table>