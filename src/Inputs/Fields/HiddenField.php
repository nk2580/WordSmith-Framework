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
class HiddenField extends Input {

    private function printField() {
        $class = $this->getClassString();
        if (!$this->readonly) {
            echo "<input type='hidden' name='" . $this->name . '" class="' . $class . '" id="' . $this->name . '" value="'.$this->value.'" />';
        } else {
            echo "<input type='hidden' readonly name='" . $this->name . '" class="' . $class . '" id="' . $this->name . '" value="'.$this->value.'" />';
        }
    }

}
