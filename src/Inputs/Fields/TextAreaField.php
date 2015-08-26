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
class TextAreaField extends Input {

    private function printField() {
        $class = $this->getClassString();
        echo '<label for="' . $this->name . '" >' . $this->label . ' ';
        echo '<textarea class="' . $class . '" name="' . $this->name . '"  id="' . $this->name . '">';
        echo $this->value;
        echo '</textarea></label>';
    }

}
