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
    public function update($id,$fields){
        $parts=[];
        $attributs=[];
        foreach($fields as $k=>$v){
            $parts[]="$k=?";
            $attributs=$v;
        }
        $attributs[]=$id;
        $sql_part=implode(',',$parts);
        return $this->query("
        UPDATE 
        {$this->table}
        SET 
        $sql_part 
        WHERE id = ?" , $attributs,true );
    } 
    public function create($fields){
        $parts=[];
        $attributs=[];
        foreach($fields as $k=>$v){
            $parts[]="$k=?";
            $attributs=$v;
        }
        $sql_part=implode(',',$parts);
        return $this->query("
        INSERT 
        {$this->table}
        SET 
        $sql_part " , $attributs,true );
    } 
    public function delete($id){
        
        return $this->query("
        DELETE 
        {$this->table}
       
        WHERE id = ?" , [$id],true );
    }
    /**
     * Summary of extactList used instead of all() to return an array instead of entity object 
     * @param mixed $key
     * @param mixed $value
     * @return array<string>
     */
    public function extactList($key,$value){
        $records=$this->all();  
        $result=[];
        foreach($records as $v){
            $result[$v->$key]="$v->$value";
           
        }
        return $result;

    }
}
