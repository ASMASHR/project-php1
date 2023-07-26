<?php
namespace Core\Table;

use App\App;
use App\DBConnection;
use Core\Database\Database;
use PDO;
/**
 * class parente avec les methodes qui vont se repeter dans les tables;
 * self:: presente la classe elle meme parconte static:: va contenir les donnees des classes filles
 */
class Table {
    protected $table;
    protected $db;
    
    public function __construct(Database $db){
        $this->db=$db;
        if (is_null($this->table)){
            $parts=explode('\\',get_class($this));
            $this->table=strtolower(str_replace('Table','',end($parts)));

        }
    }
 
    public function query($statement,$att=null,$one=false){
        if($att)
        {
           return  $this->db->prepare($statement,$att, str_replace('Table','Entity',get_class($this)),$one);
        }
        else 
       return $this->db->query($statement,str_replace('Table','Entity',get_class($this)),$one);
     
    
        //$count=$conn->exec('INSERT INTO blog SET titre="mon titre",date="'.date('Y-m-d H:i:s').'"');
         
    } 
    public function all(){
        return $this->query('SELECT * FROM '.$this->table);
    }
    public function find($id){
        return $this->query("
        SELECT * FROM  
        {$this->table}
        WHERE id = ?" ,[$id],true );
    }
 
}
