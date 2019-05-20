<?php

namespace Blixx\Validations;

use Illuminate\Contracts\Validation\Rule;

class ValidateDutchPostcode implements Rule
{

    /**
     * @var bool
     */
    private $allow_spaces = true;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($allow_spaces = true)
    {
        $this->allow_spaces = $allow_spaces;
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

        return preg_match('/^\d{4}' . ($this->allow_spaces ? '\s*' : '') . '[A-Z]{2}$/', strtoupper($value));


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Dit is geen geldig e-mailadres';
    }
}
