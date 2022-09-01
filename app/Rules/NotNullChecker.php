<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotNullChecker implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $parts = explode(" - ", $value); //convert to array

        $min = array_shift($parts);
        $max = array_pop($parts);

        if($min == "null" || $max == "null") {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The min or the max :attribute cannot be null';
    }
}
