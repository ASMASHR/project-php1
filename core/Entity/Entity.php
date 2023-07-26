<?php
namespace Core\Entity;
class Entity{
    public function __get($key){
        $meth='get'.ucfirst($key);
        $this->$key=$this->$meth();
       return $this->$key;
    }
}