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
class RadioButtonField extends Input {

    protected $options;
    protected $inline;

    private function printField() {
        $class = $this->getClassString();
        if ($this->inline) {
            echo '<div class="container-inline">';
        }
        foreach ($this->options as $label => $value) {
            if ($this->value == $value) {
                echo "<label for='" . $this->name . "' ><input type='radio' name='" . $this->name . '" class="' . $class . '" id="' . $this->name . '" value="' . $value . '" /> ' . $label . '</label>';
            } else {
                echo "<label for='" . $this->name . "' ><input readonly type='radio' name='" . $this->name . '" class="' . $class . '" id="' . $this->name . '" value="' . $value . '" /> ' . $label . '</label>';
            }
        }
        if ($this->inline) {
            echo '</div>';
        }
    }

}

?>