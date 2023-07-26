<?php

use App\Autoloader;
use Core\Autoloader as CoreAutoloader;
use Core\Config;
use Core\Database\MySqlDb;
/**
 * sauvegarder la connection à la bd
 */
class App{
    private static $_instance;
    
    public $title="gestion des articles";
    /**
     * Summary of database
     * @var 
     */
    private  $db_instance;
    public static function getInstance(){
        if(is_null(self::$_instance))
         self::$_instance=new APP();
         return self::$_instance;
    }
 
    public function getDB(){
        $config=Config::getInstance(ROOT.'/config/config.php');
        if(is_null($this->db_instance))
    {
        $this->db_instance=new  MySqlDb($config->get('DB_HOST'),$config->get('DB_USER'),$config->get('DB_PASS'),$config->get('DB_NAME'));
    }
    return $this->db_instance;
} 
  public  function getTable($name){
    $class='\\App\\Table\\'.ucfirst($name).'Table';
  
    return new $class($this->getDB());

    }
public static function load(){
    session_start();
    require(ROOT.'/app/Autoloader.php');
    Autoloader::register();
    require ROOT.'/core/Autoloader.php';
    Core\Autoloader::register();

} 
public function notfound(){
        
    header("HTTP/1.0 404 Not found");
    header('Location:index.php?p=404');

}
public function forbidden(){
    header("HTTP/1.0 403 Forbidden");
    die ('ACCES INTERDIT');

}
}
