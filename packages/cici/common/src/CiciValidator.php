<?php

namespace Cici\Common;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Log;

class CiciValidator extends Validator
{
    /*********** add by Aleutian Xie **************/
    /**
     * Validate that two attributes less than.
     *
     * @param  string  $attribute
     * @param  mixed   $value
     * @param  array   $parameters
     * @return bool
     */
    protected function validateLt($attribute, $value, $parameters)
    {
        $this->requireParameterCount(1, $parameters, 'lt');

        $other = Arr::get($this->data, $parameters[0]);

        return isset($other) && $value < $other;
    }

    /**
     * Replace all place-holders for the lt rule.
     *
     * @param  string  $message
     * @param  string  $attribute
     * @param  string  $rule
     * @param  array   $parameters
     * @return string
     */
    protected function replaceLt($message, $attribute, $rule, $parameters)
    {
        return str_replace(':other', $parameters[0], $message);
    }
}
