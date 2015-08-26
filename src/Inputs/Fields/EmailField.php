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
class EmailField extends Input {

    private function printField() {
        $class = $this->getClassString();
        if (!$this->readonly) {
            echo "<label for=" . $this->name . " >".$this->label." <input type='email' name='" . $this->name . '" class="' . $class . '" id="' . $this->name . '" value="'.$this->value.'" /></lable>';
        } else {
            echo "<label for=" . $this->name . " >".$this->label." <input type='email' readonly name='" . $this->name . '" class="' . $class . '" id="' . $this->name . '" value="'.$this->value.'" /></lable>';
        }
    }

}
