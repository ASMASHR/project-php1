<?php

namespace Core\html;
require 'Form.php';
class BootstrapForm extends Form{
    protected function surrownd($el){
        return "<div class=\"form-group\">{$el}</div>";
    
    }
 public function input($name,$label,$option=[]){
    $type=isset($option['type'])?$option['type']:'text';
    $label='<label>'.$label.'</label>';
    if($type=='textarea'){
        $input= '<textearea name="'.$name.'" class="form-control">'.$this->getValue($name).'</textearea>';
    
    }
    else
    {$input= '<input type="'.$type.'" name="'.$name.'" value="'.$this->getValue($name).'">';}
    return $this->surrownd($label . $input);
 }   
 public function select($name,$label,$option){

    $label='<label>'.$label.'</label>';
    $input= '<select name="'.$name.'" class="form-control">';
    foreach($option as $k=>$v){
        $att='';
        if($k==$this->getValue($name)){
            $att=' selected';
        }
            $input.="<option value='$k'  $att>$v</option>" ;
        }
         $input.='</select>';
    
   
    return $this->surrownd($label . $input);
 } 
public function submit(){
    return '<button type="submit" class="btn btn-primary">Envoyer </button>';
}
}