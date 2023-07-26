<?php
namespace App\Entity;
use Core\Entity\Entity;
class PostEntity extends Entity{
    public function  getUrl(){
        return 'index.php?page=single.post&id='. $this->id;
    }
    public function  getExtrait(){
        $extrait='<p>'.substr($this->contenu,0,100).'...</p>';
        $extrait.='<a href="'.$this->getUrl().'"> lire la suite </a>';
        return $extrait;
    }

}