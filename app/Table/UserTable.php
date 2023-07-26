<?php
namespace App\Table;

use App\App;
use Core\Table\Table;
/**
 * class parente avec les methodes qui vont se repeter dans les tables;
 * self:: presente la classe elle meme parconte static:: va contenir les donnees des classes filles
 */
class UserTable extends Table{
 
    protected $table="users";
}
