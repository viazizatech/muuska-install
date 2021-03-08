<?php
/**
 * User: ViaZi Za Tech
 */

namespace muuska\app\form;


/**
 * Class TextareaField
 *
 * @author  ViaZi Za Tech <contact@viaziza.com>
 * @package muuska\app\form
 */
class TextareaField extends BaseField
{
    public function renderInput()
    {
        return sprintf('<textarea class="form-control%s" name="%s">%s</textarea>',
             $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }
}