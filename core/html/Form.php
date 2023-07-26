<?php
namespace Core\html;
class Form{
    /**
     * 
    *@parm
    *@return
    */
private $data;
public $surround='p';
/**
 * Summary of __construct
 * @param mixed $data
 */
public function __construct($data=array()){
    $this->data=$data;
}
/**
 * Summary of surrownd
 * @param mixed $el
 * @return string
 */
protected function surrownd($el){
    return "<{$this->surround}>{$el}</{$this->surround}>";

}
/**
 *  
 * @param mixed $index
 * @return mixed|null
 */
protected function getValue($index){
    return isset($this->data[$index])?$this->data[$index] : null;
}
public function input($name,$label,$option=[]){
    $type=isset($option["type"]) ? $option['type']:'text';
    return $this->surrownd('<input type="'.$type .'" name="'.$name.'"value="'.$this->getValue($name).'">');
}
public function submit(){
    return $this->surrownd('<button type="submit">Envoyer </button>');
}

}