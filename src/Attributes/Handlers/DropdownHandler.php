<?php

namespace Just\Shapeshifter\Attributes\Handlers;

use Illuminate\Database\Eloquent\Model;
use Just\Shapeshifter\Attributes\Attribute;
use Just\Shapeshifter\View\AttributeView;

class DropdownHandler extends Handler
{

    /**
     * Returns the label that belongs to the value
     *
     * @param \Illuminate\Database\Eloquent\Model     $model
     * @param \Just\Shapeshifter\Attributes\Attribute $attribute
     *
     * @return string Value.
     */
    public function getDisplayValue(Model $model, Attribute $attribute)
    {
        $value = $model->{$attribute->getName()};
        $options = $attribute->getOptions();

        if (array_key_exists($value, $options)) {
            return $options[$value];
        }

        return false;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model     $model
     * @param \Just\Shapeshifter\Attributes\Attribute $attribute
     *
     * @return \Just\Shapeshifter\View\AttributeView
     */
//    public function view(Model $model, Attribute $attribute)
    public function view(Model $model, Attribute $attribute)
    {
        return new AttributeView('Dropdown', [
            'model' => $model,
            'name' => $attribute->getName(),
            'flags' => $attribute->getFlags(),
            'options' => $attribute->getOptions(),
        ]);
    }

}