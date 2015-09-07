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
class SelectBoxField extends Input {

    protected $options;

    private function printField() {
        $class = $this->getClassString();
        echo '<label for="' . $this->name . '" >'.$this->label.' ';
        echo '<select class="' . $class . '" name="' . $this->name . '"  id="' . $this->name . '">';
        foreach ($this->options as $label => $value) {
            if ($this->value == $value) {
                echo '<option selected="selected" value="'.$value.'">'.$label.'</option>';
            } else {
                echo '<option value="'.$value.'">'.$label.'</option>';
            }
        }
        echo '</select></label>';
    }

}
