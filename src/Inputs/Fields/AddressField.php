<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace nk2580\wordsmith\Inputs\Fields;

use nk2580\wordsmith\Inputs\Input as Input;

/**
 * Description of TextField
 *
 * @author accounts
 */
class AddressField extends Input {
    

    public function printField() {
        $class = $this->getClassString();
        $value = unserialize($this->value);
        '<label>Line 1 <input type="text" class="'.$class.'" name="' . $this->name . '[line1]" value="'.$value['line1'].'" /></label>';
        '<label>Line 2 <input type="text" class="'.$class.'" name="' . $this->name . '[line2]" value="'.$value['line2'].'" /></label>';
        '<label>City <input type="text" class="'.$class.'" name="' . $this->name . '[city]" value="'.$value['city'].'" /></label>';
        '<label>State <input type="text" class="'.$class.'" name="' . $this->name . '[state]" value="'.$value['state'].'" /></label>';
        '<label>Postal Code <input type="text" class="'.$class.'" name="' . $this->name . '[postcode]" value="'.$value['postcode'].'" /></label>';
    }
    
    
    public function isFieldValid() {
        if (is_array($this->value)) {
            return true;
        } 
        else if(is_string($this->value)){
            $arr = unserialize($this->value);
            if(is_array($arr)){
                return true;
            }
            else{
                return false;
            }
        }else {
            return false;
        }
    }

    public function sanitize() {
        return serialize($this->value);
    }



}
