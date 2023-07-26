
<?php
$categories=App::getInstance()->getTable('Category')->all();
?>
<h1>Administrer les categories </h1>
<a class="btn btn-primary" href="?page=category.add">Ajouter une categorie</a>
<table class="table">
    <thead>
        <tr>
            <td>id</td>
            <td>Nom</td>
            <td>actions</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($categories as $category){
            ?>    
        
        <td><?= $category->id?></td>
            <td><?= $category->nom?></td>
            <td>
                <a class="btn btn-primary" href="?page=category.edit&id=<?= $category->id?>">modifier</a>
                <form action="?page=category.delete" method="post">
                    <input type="hidden"name="id" value="<?= $category->id?>"> 
                    <button type="submit" class="btn btn-danger" href="?page=category.delete&id=<?= $category->id?>">Suprimer</button>
                </form>
               
<?php
}
        ?>
    </tbody>
</table>