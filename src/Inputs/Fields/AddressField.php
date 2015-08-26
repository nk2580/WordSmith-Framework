<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace WordSmith\Inputs\Fields;

use WordSmith\Inputs\Input as Input;

/**
 * Description of TextField
 *
 * @author accounts
 */
class AddressField extends Input {
    
    protected $country;

    private function printField() {
        $class = $this->getClassString();
        $name = "name='" . $this->name . "'[]";
        '<label>Line 1 <input type="text" name="' . $this->name . '[line1]" /></label>';
        '<label>Line 2 <input type="text" name="' . $this->name . '[line2]" /></label>';
        '<label>City <input type="text" name="' . $this->name . '[city]" /></label>';
        '<label>State <input type="text" name="' . $this->name . '[state]" /></label>';
        '<label>Postal Code <input type="text" name="' . $this->name . '[postcode]" /></label>';
        if($this->country){
         echo '<label>Country <input type="text" name="' . $this->name . '[postcode]" /></label>';
        }
    }

}
