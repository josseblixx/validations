<?php

namespace Blixx\Validations;

use Illuminate\Contracts\Validation\Rule;

class ValidateEmailWithTLD implements Rule
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
        $tmp = explode('@', $value);

        if (count($tmp) == 2) {

            list($user, $domain) = $tmp;

            // one can only check if the domain contains a dot, as there are new
            // TLDs being registered every day.
            // See https://en.wikipedia.org/wiki/List_of_Internet_top-level_domains

            $x = strrpos($domain, '.');
            return $x !== false && $x < strlen($domain) - 1;

        }
        else{
            return false;
        }
        
        
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
