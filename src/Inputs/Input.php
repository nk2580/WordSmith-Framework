<?php

/*
 * WORDSMITH INPUT GENERIC CLASS
 * 
 * the input class to be used within the framework
 */

namespace nk2580\wordsmith\Inputs;

class Input {

    protected $name;
    protected $class;
    protected $readonly;
    protected $value;
    protected $label;

    public function __construct($name, $class, $readonly) {
        $this->name = $name;
        $this->class = $class;
        $this->readonly = $readonly;
        $this->printField();
    }
    
    private function printField(){
        echo "Implementing the Input class directly is foribbben. please use an input field or type";
    }
    
    private function getClassString(){
        $string = "";
        if(is_array($this->class)){
            foreach($this->class as $class){
                $string .= $class." ";
            }
            return $string;
        }
        else{
            return $this->class;
        }
    }

}
