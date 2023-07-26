<?php 
namespace Core\Database;
use PDO;  
class MySqlDb extends Database{
        private $dbhost;
        private $dbuser;
        private $dbpass;
        private $db  ;
        private $connection;
    public function __construct($dbhost,$dbuser,$dbpass,$db)
     {
    $this->dbhost= $dbhost;
    $this->$dbuser = $dbuser;
    $this->$dbpass = $dbpass;
    $this->$db = $db;
     }
    private function  getPDO(){
        if($this->connection===null)
       { $conn = new PDO("mysql:host=localhost;dbname=blog_db", 'root', '');
           // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection=$conn;}
    
        return $this->connection;
    }
    public function query($statement,$class_name=null,$one=false){
        $req=$this->getPDO()->query($statement);
        if($class_name===null)
        $req->setFetchMode(PDO::FETCH_OBJ);
        else
        {$req->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }
        if($one){
            $res=$req->fetch() ;
        }
        else
    {$res=$req->fetchAll();}
    
    return $res;
    
    
        //$count=$conn->exec('INSERT INTO blog SET titre="mon titre",date="'.date('Y-m-d H:i:s').'"');
         
    }
    public function prepare($statement,$att,$class_name=null,$one=false){
        $req=$this->getPDO()->prepare($statement);
    $res=$req->execute($att);
    if((strpos($statement,'UPDATE')===0)||(strpos($statement,'INSERT')===0)||(strpos($statement,'DELETE')===0)){
        return $req;

    }
    if($class_name===null)
        $req->setFetchMode(PDO::FETCH_OBJ);
        else
        {$req->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }
    if($one){
        $res=$req->fetch() ;
    }
    else
    $res=$req->fetchAll();
    
    return $res; 
    }  
    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    } 
}