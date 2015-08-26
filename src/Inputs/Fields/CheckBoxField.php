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
class CheckBoxField extends Input {

    private function printField() {
        $class = $this->getClassString();
        if ($this->value == 1) {
            echo "<label for=" . $this->name . " ><input type='checkbox' checked='checked' name='" . $this->name . '" class="' . $class . '" id="' . $this->name . '" value="1" /> '.$this->label.'</lable>';
        } else {
            echo "<label for=" . $this->name . " ><input type='checkbox' name='" . $this->name . '" class="' . $class . '" id="' . $this->name . '" value="1" /> '.$this->label.'</lable>';
        }
    }

}
