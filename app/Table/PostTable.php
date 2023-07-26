<?php
namespace App\Table;

use Core\Table\Table;
/**
 * class parente avec les methodes qui vont se repeter dans les tables;
 * self:: presente la classe elle meme parconte static:: va contenir les donnees des classes filles
 */
class PostTable extends Table {
 
    protected $table="blog";
    public function getLast(){
        return $this->query("SELECT blog.id, titre,contenu,categories.nom as categorie 
        FROM blog 
        LEFT JOIN categories 
            ON categoryId=categories.id
            ORDER BY blog.date DESC ")
            ;
    }
    public function findByCategory($id){
        return $this->query("SELECT blog.id, titre,contenu,blog.categoryId,categories.nom as categorie,categories.id as categoryId 
        FROM blog 
        LEFT JOIN categories 
            ON categoryId=categories.id
            WHERE blog.id=?" ,[$id],true)
            ;
    }
    /**
     * Summary of LastByCategorie
     * @param mixed $id
     * @return mixed \App\entity\PostEntity
     * 
     */
    public function LastByCategorie($id){
        return $this->query("SELECT blog.id, titre,contenu,categories.nom as categorie 
        FROM blog 
        LEFT JOIN categories 
            ON categoryId = categories.id
            WHERE categoryID=?",[$id]
           );
    }
}
