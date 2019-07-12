<?php

namespace Spunkylm\BetterBoolean;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class BetterBoolean extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'better-boolean';

    /**
     * The value to be used when the field is "true".
     *
     * @var bool
     */
    public $trueValue = true;

    /**
     * The label to be used when the field is "true".
     *
     * @var bool
     */
    public $trueLabel = 'Yes';

    /**
     * The color to be used when the field is "true".
     *
     * @var bool
     */
    public $trueColor = '#21b978';

    /**
     * The value to be used when the field is "true".
     *
     * @var bool
     */
    public $falseValue = false;

    /**
     * The label to be used when the field is "false".
     *
     * @var bool
     */
    public $falseLabel = 'Yes';

    /**
     * The color to be used when the field is "false".
     *
     * @var bool
     */
    public $falseColor = '#e74444';

    /**
     * The text alignment for the field's text in tables.
     *
     * @var string
     */
    public $textAlign = 'center';

    /**
     * Resolve the given attribute from the given resource.
     *
     * @param  mixed  $resource
     * @param  string  $attribute
     * @return mixed
     */
    protected function resolveAttribute($resource, $attribute)
    {
        return parent::resolveAttribute($resource, $attribute) == $this->trueValue ? true : false;
    }

    /**
     * Hydrate the given attribute on the model based on the incoming request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  string  $requestAttribute
     * @param  object  $model
     * @param  string  $attribute
     * @return void
     */
    protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
    {
        if (isset($request[$requestAttribute])) {
            $model->{$attribute} = $request[$requestAttribute] == 1
                    ? $this->trueValue : $this->falseValue;
        }
    }

    /**
     * Specify the values to store for the field.
     *
     * @param  mixed  $trueValue
     * @param  mixed  $falseValue
     * @return $this
     */
    public function values($trueValue, $falseValue)
    {
        return $this->trueValue($trueValue)->falseValue($falseValue);
    }

    /**
     * Specify the value to store when the field is "true".
     *
     * @param  mixed  $value
     * @param  string  $label
     * @param  string  $color
     * @return $this
     */
    public function trueValue($value, string $label = null, string $color = null)
    {
        $this->trueValue = $value;

        if ($label) {
            $this->trueLabel = $label;
        }

        if ($color) {
            $this->trueColor = $color;
        }

        $this->withMeta([
            'trueMeta' => [
                'value' => $this->trueValue,
                'label' => $this->trueLabel,
                'color' => $this->trueColor,
            ]
        ]);

        return $this;
    }

    /**
     * Specify the value to store when the field is "false".
     *
     * @param  mixed  $value
     * @param  string  $label
     * @param  string  $color
     * @return $this
     */
    public function falseValue($value, string $label = null, string $color = null)
    {
        $this->falseValue = $value;

        if ($label) {
            $this->falseLabel = $label;
        }

        if ($color) {
            $this->falseColor = $color;
        }

        $this->withMeta([
            'falseMeta' => [
                'value' => $this->falseValue,
                'label' => $this->falseLabel,
                'color' => $this->falseColor,
            ]
        ]);

        return $this;
    }

    /**
     * Show the label on the index.
     *
     * @return $this
     */
    public function showLabelOnIndex()
    {
        $this->withMeta([
            'showLabelOnIndex' => true,
        ]);

        return $this;
    }

    /**
     * Hide the label on the index.
     *
     * @return $this
     */
    public function hideLabelOnIndex()
    {
        $this->withMeta([
            'showLabelOnIndex' => false,
        ]);

        return $this;
    }
}
