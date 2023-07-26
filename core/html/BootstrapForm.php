<?php

namespace Core\html;
require 'Form.php';
class BootstrapForm extends Form{
    protected function surrownd($el){
        return "<div class=\"form-group\">{$el}</div>";
    
    }
 public function input($name,$label,$option=[]){
    $type=isset($option['type'])?$option['type']:'text';
    return $this->surrownd(

        '<label>'.$label.'</label><input type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'">'
    );
 }   
 
public function submit(){
    return '<button type="submit" class="btn btn-primary">Envoyer </button>';
}
}